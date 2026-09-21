<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InquiryModel;

class Inquiries extends BaseController
{
    public function index()
    {
        $inquiryModel = new InquiryModel();
        $statusFilter = $this->request->getGet('status') ?? 'All';

        $builder = $inquiryModel->orderBy('id', 'DESC');
        if ($statusFilter !== 'All') {
            $builder->where('status', $statusFilter);
        }

        $inquiries = $builder->findAll();
        $counts    = $inquiryModel->getCounts();

        $data = [
            'title'        => 'Consultation Inquiries | Mayor\'s IVF Admin',
            'inquiries'    => $inquiries,
            'counts'       => $counts,
            'activeStatus' => $statusFilter,
        ];

        return view('admin/inquiries/index', $data);
    }

    public function updateStatus(int $id)
    {
        $status = $this->request->getPost('status');
        $validStatuses = ['New', 'Contacted', 'Scheduled', 'Completed', 'Cancelled'];

        if (!in_array($status, $validStatuses, true)) {
            return redirect()->back()->with('error', 'Invalid status provided.');
        }

        $inquiryModel = new InquiryModel();
        $inquiryModel->update($id, [
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => "Inquiry #{$id} status updated to {$status}.",
            ]);
        }

        return redirect()->back()->with('success', "Inquiry status updated to '{$status}'.");
    }

    public function delete(int $id)
    {
        $inquiryModel = new InquiryModel();
        $inquiryModel->delete($id);

        return redirect()->to(base_url('admin/inquiries'))->with('success', 'Inquiry deleted successfully.');
    }
}
