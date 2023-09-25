<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel;
use Config\Services;

class Users extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('admin/users');
    }

    public function create()
    {
        $data = [
            'url'          => base_url('admin/save-user'),
            'btn_text'     => 'Simpan',
            'header_text'  => 'Tambah'
        ];
        
        return view('admin/create_user', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Tidak Boleh Kosong',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_email' => 'Format Email Salah'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Tidak Boleh Kosong'
                ]
            ],
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
                    'matches' => 'Password dan Konfirmasi Password Tidak Sama'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $fullname = $this->request->getPost('fullname');
        $email   = $this->request->getPost('email');
        $passwd  = $this->request->getPost('confirm_passwd');
        $role    = $this->request->getPost('role');
        
        // check existing email except softdelete
        $user = $this->userModel->where('email', $email)->first();
        if ($user) {
            $validation = $this->validate([
                'email' => [
                    'rules' => 'is_unique[users.email]',
                    'errors' => [
                        'is_unique' => 'Email Sudah Terdaftar'
                    ]
                ]
            ]);

            if (!$validation) {
                return redirect()->back()->withInput();
            }
        }

        $data = [
            'fullname'  => $fullname,
            'email'     => $email,
            'passwd'    => password_hash($passwd, PASSWORD_BCRYPT),
            'role'      => $role
        ];
        $id = $this->userModel->insert($data);

        if ($id) {
            return redirect()->to('admin/users')->with('success', 'User berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'User gagal ditambahkan.');
        }
    }

    public function edit($id)
    {
        $user_id = $this->encrypter->decrypt(hex2bin($id));
        $user = $this->userModel->where('user_idx', $user_id)->first();
        session()->set(['email' => $user['email']]);

        $data = [
            'user_id'    => bin2hex($this->encrypter->encrypt($user['user_idx'])),
            'fullname'    => $user['fullname'],
            'email'       => $user['email'],
            'role'        => $user['role'],
            'url'         => base_url('admin/update-user'),
            'btn_text'    => 'Update',
            'header_text' => 'Update'
        ];
        return view('admin/create_user', $data);
    }

    public function update()
    {
        $validation = $this->validate([
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Tidak Boleh Kosong',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Tidak Boleh Kosong'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $user_id        = $this->request->getPost('user_id');
        $user_id        = $this->encrypter->decrypt(hex2bin($user_id));
        $fullname        = $this->request->getPost('fullname');
        $email          = $this->request->getPost('email');
        $passwd         = $this->request->getPost('passwd');
        $confirm_passwd = $this->request->getPost('confirm_passwd');
        $role           = $this->request->getPost('role');
        
        // jika email != session email
        if (!empty($email) && $email != session()->get('email')) {
            $user = $this->userModel->where('email', $email)->first();
            if ($user) {
                $validation = $this->validate([
                    'email' => [
                        'rules' => 'is_unique[users.email]',
                        'errors' => [
                            'is_unique' => 'Email Sudah Terdaftar'
                        ]
                    ]
                ]); //rules
        
                if (!$validation) {
                    return redirect()->back()->withInput();
                }
            }
        }

        if (!empty($passwd) && !empty($confirm_passwd)) {
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
                        'matches' => 'Password dan Konfirmasi Password Tidak Sama'
                    ]
                ]
            ]); //rules
    
            if (!$validation) {
                return redirect()->back()->withInput();
            }
        }

        $data = [
            'fullname'  => $fullname,
            'email'     => $email,
            'passwd'    => password_hash($confirm_passwd, PASSWORD_BCRYPT),
            'role'      => $role
        ];
        $this->userModel->update($user_id, $data);

        return redirect()->to('admin/users')->with('success', 'User berhasil diupdate.');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $user_idx = $this->encrypter->decrypt(hex2bin($id));
            $user = $this->userModel->where('user_idx', $user_idx)->first();

            if (!$user_idx) {
                return redirect()->to('admin/users')->with('error', 'Data User Tidak Ditemukan');
            }

            // delete user
            $this->userModel->delete($user_idx);    

            return redirect()->to('admin/users')->with('success', 'Data User Berhasil Dihapus');
        }
    }

    public function ajax_user_list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $table = 'users';
            $where = 'deleted_at IS NULL';
            $orWhere = '';
            $column_order = array();
            $column_search = array();
            $order = array('created_at' => 'desc');
            $lists = $this->userModel->get_datatables($table, $column_order, $column_search, $order, $where, $orWhere);
            $data = array();
            $no = $this->request->getPost("start");

            foreach ($lists as $list) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = '<a href="'.base_url('admin/edit-user/'.bin2hex($this->encrypter->encrypt($list->user_idx))).'" title="Edit User">'.$list->fullname.'</a>';
                $row[] = $list->email;
                $row[] = $list->role;
                $list->action = "<a data-toggle=\"confirm\" data-title=\"Konfirmasi\" data-text=\"Yakin User Dihapus ?\" href=\"". base_url('admin/delete-user/'.bin2hex($this->encrypter->encrypt($list->user_idx))) ."\"><i class=\"fas fa-trash\"></i></a>";
                $row[] = $list->action;
                $data[] = $row;
            }

            $output = array(
                "draw" => $this->request->getPost("draw"),
                "recordsTotal" => $this->userModel->count_all($table, $where),
                "recordsFiltered" => $this->userModel->count_filtered($table, $column_order, $column_search, $order, $where),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }
}
