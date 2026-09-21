<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // 1. Seed Admin User
        $userBuilder = $db->table('users');
        $existingAdmin = $userBuilder->where('email', 'admin@mayurivf.com')->get()->getRow();

        if (!$existingAdmin) {
            $userBuilder->insert([
                'name'          => 'Dr. Meetu Bhushan / Administrator',
                'email'         => 'admin@mayurivf.com',
                'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'          => 'admin',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
        }

        // 2. Seed Initial Blogs
        $blogModel = new \App\Models\BlogModel();
        $initialArticles = $blogModel->getStaticArticles();
        $blogBuilder = $db->table('blogs');

        foreach ($initialArticles as $article) {
            $exists = $blogBuilder->where('slug', $article['slug'])->get()->getRow();
            if (!$exists) {
                $blogBuilder->insert([
                    'slug'         => $article['slug'],
                    'title'        => $article['title'],
                    'category'     => $article['category'],
                    'read_time'    => $article['read_time'],
                    'author'       => $article['author'] ?? 'Dr. Meetu Bhushan',
                    'img'          => $article['img'],
                    'desc'         => $article['desc'],
                    'content'      => $article['content'],
                    'is_featured'  => !empty($article['featured']) ? 1 : 0,
                    'is_published' => 1,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ]);
            }
        }

        // 3. Seed Sample Inquiries
        $inquiryBuilder = $db->table('inquiries');
        if ($inquiryBuilder->countAllResults() === 0) {
            $inquiryBuilder->insertBatch([
                [
                    'name'              => 'Pooja Sharma',
                    'phone'             => '+91 98765 43210',
                    'email'             => 'pooja.sharma@example.com',
                    'age'               => 31,
                    'appointment_date'  => date('Y-m-d', strtotime('+2 days')),
                    'consultation_type' => 'IVF Consultation',
                    'message'           => 'Looking for initial consultation regarding IVF treatment and success rate estimation.',
                    'status'            => 'New',
                    'created_at'        => date('Y-m-d H:i:s', strtotime('-2 hours')),
                    'updated_at'        => date('Y-m-d H:i:s', strtotime('-2 hours')),
                ],
                [
                    'name'              => 'Rahul & Sunita Verma',
                    'phone'             => '+91 98111 22334',
                    'email'             => 'rahul.verma@example.com',
                    'age'               => 34,
                    'appointment_date'  => date('Y-m-d', strtotime('+3 days')),
                    'consultation_type' => 'Fertility Assessment',
                    'message'           => 'We have been trying for 2 years. Want to do comprehensive tests.',
                    'status'            => 'Contacted',
                    'created_at'        => date('Y-m-d H:i:s', strtotime('-1 day')),
                    'updated_at'        => date('Y-m-d H:i:s', strtotime('-1 day')),
                ],
                [
                    'name'              => 'Neha Gupta',
                    'phone'             => '+91 99887 76655',
                    'email'             => 'neha.gupta@example.com',
                    'age'               => 29,
                    'appointment_date'  => date('Y-m-d', strtotime('+5 days')),
                    'consultation_type' => 'PCOS Consultation',
                    'message'           => 'Diagnosed with irregular periods and PCOS, seeking advice on conceiving naturally or with IUI.',
                    'status'            => 'Scheduled',
                    'created_at'        => date('Y-m-d H:i:s', strtotime('-3 days')),
                    'updated_at'        => date('Y-m-d H:i:s', strtotime('-3 days')),
                ],
            ]);
        }

        // 4. Seed Categories
        $catBuilder = $db->table('categories');
        $initialCategories = [
            ['name' => 'IVF', 'slug' => 'ivf', 'description' => 'In Vitro Fertilization & Assisted Reproductive Technologies'],
            ['name' => 'Fertility', 'slug' => 'fertility', 'description' => 'General Fertility Assessment, Guidance & Diagnosis'],
            ['name' => 'Preservation', 'slug' => 'preservation', 'description' => 'Egg Freezing & Embryo Vitrification'],
            ['name' => 'PCOS', 'slug' => 'pcos', 'description' => 'Polycystic Ovarian Syndrome & Hormonal Management'],
            ['name' => 'Infertility', 'slug' => 'infertility', 'description' => 'Unexplained Infertility & Advanced Care'],
            ['name' => 'Treatments', 'slug' => 'treatments', 'description' => 'IUI, ICSI, Laparoscopy & Clinical Treatments'],
            ['name' => 'Male Fertility', 'slug' => 'male-fertility', 'description' => 'Sperm Health, Diagnostics & Andrology Solutions'],
        ];

        foreach ($initialCategories as $cat) {
            $exists = $catBuilder->where('slug', $cat['slug'])->get()->getRow();
            if (!$exists) {
                $catBuilder->insert([
                    'name'        => $cat['name'],
                    'slug'        => $cat['slug'],
                    'description' => $cat['description'],
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
