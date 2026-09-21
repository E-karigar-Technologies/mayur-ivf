<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InquiryModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $inquiryModel  = new InquiryModel();
        $blogModel     = new BlogModel();
        $categoryModel = new CategoryModel();

        $inquiryCounts   = $inquiryModel->getCounts();
        $recentInquiries = $inquiryModel->getLatest(6);
        $recentBlogs     = $blogModel->getAllArticles();
        $recentBlogs     = array_slice($recentBlogs, 0, 5);
        $totalBlogs      = $blogModel->countAllResults(false);
        $totalCategories = $categoryModel->countAllResults(false);

        $data = [
            'title'           => 'Dashboard | Mayor\'s IVF Admin',
            'inquiryCounts'   => $inquiryCounts,
            'recentInquiries' => $recentInquiries,
            'recentBlogs'     => $recentBlogs,
            'totalBlogs'      => $totalBlogs,
            'totalCategories' => $totalCategories,
        ];

        return view('admin/dashboard', $data);
    }
}
