<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InquiryModel;
use App\Models\BlogModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $inquiryModel = new InquiryModel();
        $blogModel    = new BlogModel();

        $inquiryCounts = $inquiryModel->getCounts();
        $recentInquiries = $inquiryModel->getLatest(6);
        $recentBlogs = $blogModel->orderBy('id', 'DESC')->findAll(5);
        $totalBlogs = $blogModel->countAllResults(false);

        $data = [
            'title'           => 'Dashboard | Mayor\'s IVF Admin',
            'inquiryCounts'   => $inquiryCounts,
            'recentInquiries' => $recentInquiries,
            'recentBlogs'     => $recentBlogs,
            'totalBlogs'      => $totalBlogs,
        ];

        return view('admin/dashboard', $data);
    }
}
