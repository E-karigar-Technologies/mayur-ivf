<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dr. Meetu Bhushan | IVF Specialist & Fertility Consultant',
        ];

        return view('home', $data);
    }

    public function appointment()
    {
        $rules = [
            'name'  => 'required|min_length[3]|max_length[100]',
            'phone' => 'required|min_length[8]|max_length[20]',
            'email' => 'required|valid_email',
        ];

        if (! $this->validate($rules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $this->validator->getErrors(),
                ])->setStatusCode(400);
            }

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process and save appointment request to database
        $inquiryModel = new \App\Models\InquiryModel();
        
        $appointmentData = [
            'name'              => $this->request->getPost('name'),
            'phone'             => $this->request->getPost('phone'),
            'email'             => $this->request->getPost('email'),
            'age'               => $this->request->getPost('age') ? (int) $this->request->getPost('age') : null,
            'appointment_date'  => $this->request->getPost('date') ?: null,
            'consultation_type' => $this->request->getPost('type') ?: 'IVF Consultation',
            'message'           => $this->request->getPost('message'),
            'status'            => 'New',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ];

        try {
            $inquiryModel->insert($appointmentData);
        } catch (\Throwable $e) {
            log_message('error', 'Failed to save inquiry: ' . $e->getMessage());
        }

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Consultation appointment request received successfully.',
                'data'    => $appointmentData,
            ]);
        }

        return redirect()->to('/#book')->with('success', 'Thank you! Your consultation request has been received.');
    }

    public function blog(): string
    {
        $blogModel = new \App\Models\BlogModel();
        $category  = $this->request->getGet('category') ?? 'All';

        $data = [
            'title'          => 'Fertility & IVF Insights | Dr. Meetu Bhushan',
            'articles'       => $blogModel->getByCategory($category),
            'featured'       => $blogModel->getFeatured(),
            'categories'     => $blogModel->getCategories(),
            'activeCategory' => $category,
        ];

        return view('blog/index', $data);
    }

    public function blogDetail(string $slug): string
    {
        $blogModel = new \App\Models\BlogModel();
        $article   = $blogModel->getBySlug($slug);

        if (! $article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Article not found: {$slug}");
        }

        // Get related articles in same category
        $related = array_values(array_filter($blogModel->getAll(), function ($a) use ($article, $slug) {
            return $a['slug'] !== $slug && ($a['category'] === $article['category'] || true);
        }));

        $data = [
            'title'   => $article['title'] . ' | Dr. Meetu Bhushan',
            'article' => $article,
            'related' => array_slice($related, 0, 2),
        ];

        return view('blog/show', $data);
    }

    public function gallery(): string
    {
        $category = $this->request->getGet('category') ?? 'All';

        $data = [
            'title'          => 'Photo & Video Gallery | Dr. Meetu Bhushan - Mayor\'s IVF',
            'items'          => \App\Models\GalleryModel::getCategoryItems($category),
            'categories'     => \App\Models\GalleryModel::getCategories(),
            'activeCategory' => $category,
        ];

        return view('gallery/index', $data);
    }
}
