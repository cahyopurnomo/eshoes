<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\LoginModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->login = new LoginModel();
    }

    public function index()
    {
        if (!empty(session()->get('user_idx')))
            return redirect()->to('/admin/dashboard');
        else
            return view('admin/login');
    }

    public function do_login()
    {
        $email  = $this->request->getPost('email');
        $passwd = $this->request->getPost('password');

        $login = $this->login->where(['email' => $email])->first();
        if ($login) {
            if (password_verify($passwd, $login['passwd'])) {
                session()->set([
                    'user_idx'   => $login['user_idx'],
                    'email'      => $login['email'],
                    'fullname'   => $login['fullname'],
                    'isLoggedIn' => TRUE,
                    'loggedAs'   => 'admin',
                    'segment'    => 'admin',
                ]);
                return redirect()->to('admin/dashboard');
            } else {
                session()->setFlashdata('error', 'Email & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Email & Password Salah');
            return redirect()->back();
        }
    }

    public function forgot_password()
    {

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('/admin'));
    }
}
