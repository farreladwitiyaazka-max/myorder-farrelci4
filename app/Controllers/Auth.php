<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper('form');

        if ($this->request->getMethod() === 'POST') {

            $username = trim($this->request->getPost('username'));

            if ($username == '') {
                return redirect()->back()->with('error', 'Username wajib diisi!');
            }

            $userModel = new UserModel();

            $user = $userModel->where('username', $username)->first();

            // Jika user belum ada, buat otomatis
            if (!$user) {

                $role = ($username == 'admin') ? 'admin' : 'user';

                $userModel->insert([
                    'username' => $username,
                    'role' => $role
                ]);

                $user = $userModel->where('username', $username)->first();
            }

            session()->set([
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role'],
                'login'    => true
            ]);

            if ($user['role'] == 'admin') {
                return redirect()->to('/admin');
            }

            return redirect()->to('/');
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}