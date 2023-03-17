<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function register()
    {
        if ($this->request->getMethod() == 'get') {
            return view('register');
        } else if ($this->request->getMethod() == 'post') {
            if ($this->validate([
                'username' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[5]|max_length[20]',
                'cpassword' => 'matches[password]'
            ])) {
                $username = $this->request->getVar("username");
                $email = $this->request->getVar("email");
                $password = $this->request->getVar("password");

                $data = [
                    "username" => $username,
                    "email" => $email,
                    "password" => $password
                ];

                $model = new UserModel();
                $model->insert($data);

                $session = session();
                $session->set("success_message", "User registered successfully");
                $session->markAsFlashdata("success_message");

                return view('register');
            } else {
                return redirect()->back()->withInput();
            }
        }
    }

    public function login()
    {
        return view('login');
    }
}
