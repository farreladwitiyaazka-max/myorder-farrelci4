<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
   public function login()
{
    helper(['form']);

    if ($this->request->getMethod() == 'post') {

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true
            ]);

            if ($user['role'] == 'admin') {

                return redirect()->to('/admin');

            }

            return redirect()->to('/');

        }

        return redirect()->back()
            ->with('error', 'Username atau Password salah.');
    }

    return view('auth/login');
}
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}