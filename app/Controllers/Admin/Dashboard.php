<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InquiryModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\GalleryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $inquiryModel  = new InquiryModel();
        $blogModel     = new BlogModel();
        $categoryModel = new CategoryModel();
        $galleryModel  = new GalleryModel();

        $inquiryCounts   = $inquiryModel->getCounts();
        $recentInquiries = $inquiryModel->getLatest(6);
        $recentBlogs     = $blogModel->getAllArticles();
        $recentBlogs     = array_slice($recentBlogs, 0, 5);
        $totalBlogs      = $blogModel->countAllResults(false);
        $totalCategories = $categoryModel->countAllResults(false);
        $totalGallery    = $galleryModel->countAllResults(false);

        $data = [
            'title'           => 'Dashboard | Mayor\'s IVF Admin',
            'inquiryCounts'   => $inquiryCounts,
            'recentInquiries' => $recentInquiries,
            'recentBlogs'     => $recentBlogs,
            'totalBlogs'      => $totalBlogs,
            'totalCategories' => $totalCategories,
            'totalGallery'    => $totalGallery,
        ];

        return view('admin/dashboard', $data);
    }
}
