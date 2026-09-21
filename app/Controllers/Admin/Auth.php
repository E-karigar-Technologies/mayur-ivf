<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $session = session();
        if ($session->get('is_admin_logged_in')) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return view('admin/auth/login', [
            'title' => 'Admin Login | Mayor\'s IVF',
        ]);
    }

    public function authenticate()
    {
        $session = session();
        $email    = trim($this->request->getPost('email') ?? '');
        $password = $this->request->getPost('password') ?? '';

        if (empty($email) || empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Please enter both email and password.');
        }

        $userModel = new UserModel();
        $user = $userModel->findByEmail($email);

        if (!$user) {
            // Check default fallback admin if database was freshly created
            if ($email === 'admin@mayurivf.com' && $password === 'admin123') {
                $session->set([
                    'is_admin_logged_in' => true,
                    'admin_id'           => 1,
                    'admin_name'         => 'Dr. Meetu Bhushan',
                    'admin_email'        => 'admin@mayurivf.com',
                    'admin_role'         => 'admin',
                ]);
                return redirect()->to(base_url('admin/dashboard'))->with('success', 'Welcome back, Dr. Meetu Bhushan!');
            }

            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        if (!password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        $session->set([
            'is_admin_logged_in' => true,
            'admin_id'           => $user['id'],
            'admin_name'         => $user['name'],
            'admin_email'        => $user['email'],
            'admin_role'         => $user['role'],
        ]);

        return redirect()->to(base_url('admin/dashboard'))->with('success', 'Welcome back, ' . $user['name'] . '!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'))->with('success', 'You have been successfully logged out.');
    }
}
