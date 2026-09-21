<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\BlogModel;

class Categories extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getWithPostCount();

        $data = [
            'title'      => 'Manage Categories | Mayor\'s IVF Admin',
            'categories' => $categories,
        ];

        return view('admin/categories/index', $data);
    }

    public function store()
    {
        $rules = [
            'name'        => 'required|min_length[2]|max_length[100]|is_unique[categories.name]',
            'description' => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = trim($this->request->getPost('name'));
        $slug = trim($this->request->getPost('slug') ?? '');

        if (empty($slug)) {
            $slug = url_title($name, '-', true);
        } else {
            $slug = url_title($slug, '-', true);
        }

        $categoryModel = new CategoryModel();
        $categoryModel->insert([
            'name'        => $name,
            'slug'        => $slug,
            'description' => trim($this->request->getPost('description') ?? ''),
        ]);

        return redirect()->to(base_url('admin/categories'))->with('success', "Category '{$name}' created successfully!");
    }

    public function update(int $id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        if (! $category) {
            return redirect()->to(base_url('admin/categories'))->with('error', 'Category not found.');
        }

        $rules = [
            'name'        => "required|min_length[2]|max_length[100]|is_unique[categories.name,id,{$id}]",
            'description' => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $oldName = $category['name'];
        $name    = trim($this->request->getPost('name'));
        $slug    = trim($this->request->getPost('slug') ?? '');

        if (empty($slug)) {
            $slug = url_title($name, '-', true);
        } else {
            $slug = url_title($slug, '-', true);
        }

        $categoryModel->update($id, [
            'name'        => $name,
            'slug'        => $slug,
            'description' => trim($this->request->getPost('description') ?? ''),
        ]);

        // If name changed, update blogs with the old category name
        if ($oldName !== $name) {
            $db = \Config\Database::connect();
            $db->table('blogs')->where('category', $oldName)->update(['category' => $name]);
        }

        return redirect()->to(base_url('admin/categories'))->with('success', "Category '{$name}' updated successfully!");
    }

    public function delete(int $id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        if (! $category) {
            return redirect()->to(base_url('admin/categories'))->with('error', 'Category not found.');
        }

        $categoryName = $category['name'];

        // Check if any blog uses this category
        $db = \Config\Database::connect();
        $postCount = $db->table('blogs')->where('category', $categoryName)->countAllResults();

        if ($postCount > 0) {
            // Reassign or keep notice
            $db->table('blogs')->where('category', $categoryName)->update(['category' => 'General']);
        }

        $categoryModel->delete($id);

        return redirect()->to(base_url('admin/categories'))->with('success', "Category '{$categoryName}' deleted successfully." . ($postCount > 0 ? " ({$postCount} linked post(s) updated to 'General')" : ''));
    }
}
