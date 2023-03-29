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
        if ($this->request->getMethod() == "get") {
            return view('login');
        } else if ($this->request->getMethod() == "post") {
            // validate
            if ($this->validate([
                'email' => 'required|valid_email',
                'password' => 'required',
            ])) {
                $model = new UserModel();
                $record = $model->where("email", $this->request->getVar("email"))
                    ->where("password", $this->request->getVar("password"))
                    ->first();

                $session = session();

                if (!is_null($record)) {
                    // data found at database
                    $sess_data = [
                        "username" => $record["username"],
                        "email" => $record["email"],
                        "user_type" => $record["user_type"],
                        "loginned" => "loginned"
                    ];

                    $session->set($sess_data);

                    if ($record['user_type'] == "user") {
                        // go to user page
                        $url = "user_dashboard";
                    } else if ($record['user_type'] == "admin") {
                        // go to admin page
                        $url = "admin_dashboard";
                    }

                    return redirect()->to(base_url($url));
                } else {

                    $session->set("failed_message", "Record does not matched, try again.");
                    $session->markAsFlashdata("failed_message");

                    return redirect()->back()->withInput();
                }
            } else {
                return redirect()->back()->withInput();
            }
        }
    }

    public function logout()
    {
        $session = session();
        session_unset();
        session_destroy();

        return redirect()->to(base_url());
    }
}
