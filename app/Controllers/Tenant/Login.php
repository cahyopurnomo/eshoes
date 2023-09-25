<?php

namespace App\Controllers\Tenant;

use App\Controllers\BaseController;
use App\Models\Tenant\TenantModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->tenant = new TenantModel();
    }

    public function index()
    {
        if (!empty(session()->get('tenant_idx')))
            return redirect()->to('/tenant/dashboard');
        else
            return view('Tenant/login');
    }

    public function do_login()
    {
        $email  = $this->request->getPost('email');
        $passwd = $this->request->getPost('password');

        $tenant = $this->tenant->where(['email' => $email])->first();
        if ($tenant) {
            if (password_verify($passwd, $tenant['passwd'])) {
                session()->set([
                    'tenant_idx'    => $tenant['tenant_idx'],
                    'email'         => $tenant['email'],
                    'tenant_name'   => $tenant['tenant_name'],
                    'isLoggedIn'    => TRUE,
                    'loggedAs'      => 'tenant',
                    'segment'       => 'tenant',
                ]);
                return redirect()->to('tenant/dashboard');
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
        return redirect()->to(site_url('/login'));
    }
}
