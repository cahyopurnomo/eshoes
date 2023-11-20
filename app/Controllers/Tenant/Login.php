<?php

namespace App\Controllers\Tenant;

use App\Controllers\BaseController;
use App\Models\Tenant\TenantModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->tenantModel = new TenantModel();
    }

    public function index()
    {
        if (!empty(session()->get('tenant_idx')))
            return redirect()->to('/tenant/product');
        else
            return view('tenant/login');
    }

    public function do_login()
    {
        $email  = $this->request->getPost('email');
        $passwd = $this->request->getPost('password');

        $tenant = $this->tenantModel->where(['email' => $email])->first();
        if ($tenant) {
            if (password_verify($passwd, $tenant['passwd'])) {
                session()->set([
                    'user_idx'      => $tenant['tenant_idx'],
                    'email'         => $tenant['email'],
                    'fullname'      => $tenant['tenant_name'],
                    'isLoggedIn'    => TRUE,
                    'loggedAs'      => 'tenant',
                    'segment'       => 'tenant',
                ]);
                return redirect()->to('tenant/product');
            } else {
                session()->setFlashdata('error', 'Email & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Email & Password Salah');
            return redirect()->back();
        }
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
        $this->tenantModel->update($user_id, $data_passwd);

        return redirect()->to(base_url('tenant/change-passwd'))->with('success', 'Password Berhasil Diupdate.');
    }

    public function forgot_password()
    {
        $email = $this->request->getPost('email');
        $tenant = $this->tenantModel->where('email', $email)->first();

        if (!$tenant) {
            $data = [
                'token' => csrf_hash(),
                'status' => false,
                'message' => 'Email Tidak Terdaftar'
            ];
            return $this->response->setJSON($data);
        }

        //reset password
        $passwd = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $message = 'Hi, <br>Password berhasil diperbaharui. ';
        $message .= 'Password baru Anda: '.$passwd.'<br><br>';
        
        $data_email = [
            'to'      => $tenant['email'],
            'subject' => 'Reset Password',
            'message' => $message,
        ];
        send_email($data_email);

        $data = [
            'passwd' => password_hash($passwd, PASSWORD_BCRYPT)
        ];
        $this->tenantModel->update($tenant['tenant_idx'], $data);

        $data = [
            'token' => csrf_hash(),
            'status' => true,
            'message' => 'Password baru sudah dikirimkan ke email.'
        ];
        return $this->response->setJSON($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('/login'));
    }
}
