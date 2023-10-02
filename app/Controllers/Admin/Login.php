<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\LoginModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->loginModel = new LoginModel();
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

        $login = $this->loginModel->where(['email' => $email])->first();
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

    public function change_passwd()
    {
        $url_save = session()->get('loggedAs') == 'admin' ? base_url('admin/do-change-passwd') : base_url('tenant/do-change-passwd');
        $url_back = session()->get('loggedAs') == 'admin' ? base_url('admin/change-passwd') : base_url('tenant/change-passwd');
        $user_id = bin2hex($this->encrypter->encrypt(session()->get('user_idx')));

        $data = [
            'user_id'  => $user_id,
            'url_save' => $url_save,
            'url_back' => $url_back
        ];

        return view('admin/change_passwd', $data);
    }

    public function do_change_passwd()
    {
        $validation = $this->validate([
            'passwd' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'min_length' => 'Password Min 5 Karakter'
                ]
            ],
            'confirm_passwd' => [
                'rules' => 'required|min_length[5]|matches[passwd]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'min_length' => 'Password Min 5 Karakter',
                    'matches' => 'Password dan Ulangi Password Baru Tidak Sama'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $user_id = $this->request->getPost('user_id');

        if (empty($user_id)) {
            return redirect()->back()->with('error', 'User ID Tidak Boleh Kosong');
        }

        $user_id        = $this->encrypter->decrypt(hex2bin($user_id));
        $passwd         = $this->request->getPost('passwd');
        $confirm_passwd = $this->request->getPost('confirm_passwd');
        
        $data_passwd = [
            'passwd' => password_hash($confirm_passwd, PASSWORD_BCRYPT),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->loginModel->update($user_id, $data_passwd);

        return redirect()->to(base_url('admin/change-passwd'))->with('success', 'Password Berhasil Diupdate.');
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
