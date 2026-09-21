<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class Blogs extends BaseController
{
    public function index()
    {
        $blogModel = new BlogModel();
        $blogs = $blogModel->getAllArticles();

        $data = [
            'title' => 'Manage Blogs | Mayor\'s IVF Admin',
            'blogs' => $blogs,
        ];

        return view('admin/blogs/index', $data);
    }

    public function create()
    {
        $blogModel = new BlogModel();
        $categories = $blogModel->getCategories();

        $data = [
            'title'      => 'Create New Article | Mayor\'s IVF Admin',
            'categories' => array_filter($categories, fn($c) => $c !== 'All'),
        ];

        return view('admin/blogs/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'    => 'required|min_length[5]|max_length[255]',
            'category' => 'required',
            'desc'     => 'required',
            'content'  => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = trim($this->request->getPost('slug') ?? '');

        if (empty($slug)) {
            $slug = url_title($title, '-', true);
        } else {
            $slug = url_title($slug, '-', true);
        }

        // Handle image upload or image URL
        $imgUrl = $this->request->getPost('img_url');
        $imgFile = $this->request->getFile('img_file');

        if ($imgFile && $imgFile->isValid() && ! $imgFile->hasMoved()) {
            $newName = $imgFile->getRandomName();
            $imgFile->move(FCPATH . 'uploads/blogs', $newName);
            $imgUrl = base_url('uploads/blogs/' . $newName);
        }

        if (empty($imgUrl)) {
            $imgUrl = 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=800&h=480&fit=crop&auto=format';
        }

        $blogModel = new BlogModel();

        // Check unique slug
        $existing = $blogModel->where('slug', $slug)->first();
        if ($existing) {
            $slug = $slug . '-' . time();
        }

        $blogModel->insert([
            'slug'         => $slug,
            'title'        => $title,
            'category'     => $this->request->getPost('category'),
            'read_time'    => $this->request->getPost('read_time') ?: '5 min read',
            'author'       => $this->request->getPost('author') ?: 'Dr. Meetu Bhushan',
            'img'          => $imgUrl,
            'desc'         => $this->request->getPost('desc'),
            'content'      => $this->request->getPost('content'),
            'is_featured'  => $this->request->getPost('is_featured') ? 1 : 0,
            'is_published' => $this->request->getPost('is_published') ? 1 : 0,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('admin/blogs'))->with('success', 'Article published successfully!');
    }

    public function edit(int $id)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);

        if (! $blog) {
            return redirect()->to(base_url('admin/blogs'))->with('error', 'Article not found.');
        }

        $categories = $blogModel->getCategories();

        $data = [
            'title'      => 'Edit Article: ' . $blog['title'],
            'blog'       => $blog,
            'categories' => array_filter($categories, fn($c) => $c !== 'All'),
        ];

        return view('admin/blogs/edit', $data);
    }

    public function update(int $id)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);

        if (! $blog) {
            return redirect()->to(base_url('admin/blogs'))->with('error', 'Article not found.');
        }

        $rules = [
            'title'    => 'required|min_length[5]|max_length[255]',
            'category' => 'required',
            'desc'     => 'required',
            'content'  => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = trim($this->request->getPost('slug') ?? '');

        if (empty($slug)) {
            $slug = url_title($title, '-', true);
        } else {
            $slug = url_title($slug, '-', true);
        }

        // Handle image upload or image URL
        $imgUrl = $this->request->getPost('img_url') ?: $blog['img'];
        $imgFile = $this->request->getFile('img_file');

        if ($imgFile && $imgFile->isValid() && ! $imgFile->hasMoved()) {
            $newName = $imgFile->getRandomName();
            $imgFile->move(FCPATH . 'uploads/blogs', $newName);
            $imgUrl = base_url('uploads/blogs/' . $newName);
        }

        $blogModel->update($id, [
            'slug'         => $slug,
            'title'        => $title,
            'category'     => $this->request->getPost('category'),
            'read_time'    => $this->request->getPost('read_time') ?: '5 min read',
            'author'       => $this->request->getPost('author') ?: 'Dr. Meetu Bhushan',
            'img'          => $imgUrl,
            'desc'         => $this->request->getPost('desc'),
            'content'      => $this->request->getPost('content'),
            'is_featured'  => $this->request->getPost('is_featured') ? 1 : 0,
            'is_published' => $this->request->getPost('is_published') ? 1 : 0,
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('admin/blogs'))->with('success', 'Article updated successfully!');
    }

    public function toggleStatus(int $id)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);

        if ($blog) {
            $newStatus = $blog['is_published'] ? 0 : 1;
            $blogModel->update($id, ['is_published' => $newStatus, 'updated_at' => date('Y-m-d H:i:s')]);
            $statusText = $newStatus ? 'Published' : 'Draft';
            return redirect()->back()->with('success', "Article marked as {$statusText}.");
        }

        return redirect()->back()->with('error', 'Article not found.');
    }

    public function delete(int $id)
    {
        $blogModel = new BlogModel();
        $blogModel->delete($id);

        return redirect()->to(base_url('admin/blogs'))->with('success', 'Article deleted successfully.');
    }
}
