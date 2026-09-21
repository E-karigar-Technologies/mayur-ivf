<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'name',
        'slug',
        'description',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getWithPostCount(): array
    {
        $db = \Config\Database::connect();
        $categories = $this->orderBy('name', 'ASC')->findAll();

        foreach ($categories as &$cat) {
            $cat['posts_count'] = $db->table('blogs')
                ->where('category', $cat['name'])
                ->countAllResults();
        }

        return $categories;
    }

    public function getActiveNames(): array
    {
        $categories = $this->orderBy('name', 'ASC')->findAll();
        if (empty($categories)) {
            return ['IVF', 'Fertility', 'Preservation', 'PCOS', 'Infertility', 'Treatments', 'Male Fertility'];
        }

        return array_column($categories, 'name');
    }
}
