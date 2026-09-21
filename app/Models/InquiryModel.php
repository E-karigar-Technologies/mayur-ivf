<?php

namespace App\Models;

use CodeIgniter\Model;

class InquiryModel extends Model
{
    protected $table            = 'inquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'name',
        'phone',
        'email',
        'age',
        'appointment_date',
        'consultation_type',
        'message',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getLatest(int $limit = 10): array
    {
        return $this->orderBy('id', 'DESC')->findAll($limit);
    }

    public function getCounts(): array
    {
        return [
            'total'     => $this->countAllResults(false),
            'new'       => (clone $this)->where('status', 'New')->countAllResults(),
            'contacted' => (clone $this)->where('status', 'Contacted')->countAllResults(),
            'scheduled' => (clone $this)->where('status', 'Scheduled')->countAllResults(),
            'completed' => (clone $this)->where('status', 'Completed')->countAllResults(),
        ];
    }
}
