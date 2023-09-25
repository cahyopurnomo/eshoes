<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\TenantModel;
use App\Models\Admin\CityModel;
use App\Models\Admin\ProvinceModel;
use Config\Services;

class Tenant extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->tenantModel = new TenantModel();
        $this->provinceModel = new ProvinceModel();
        $this->cityModel = new CityModel();
    }

    public function index()
    {
        return view('admin/tenant');
    }

    public function create()
    {
        $data = [
            'province_idx' => '',
            'city_idx'     => '',
            'province'     => $this->provinceModel->findAll(),
            'city'         => $this->cityModel->findAll(),
            'url'          => base_url('admin/save-tenant'),
            'btn_text'     => 'Simpan',
            'header_text'  => 'Tambah'
        ];
        return view('admin/create_tenant', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'tenant_name' => [
                'rules' => 'required|is_unique[tenant.tenant_name]',
                'errors' => [
                    'required' => 'Nama Brand Tidak Boleh Kosong',
                    'is_unique' => 'Nama Brand Sudah Terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_email' => 'Format Email Salah'
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
            ],
            'phone' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Selular Tidak Boleh Kosong',
                    'numeric' => 'Nomor Selular Hanya Angka'
                ]
            ],
            'city_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kota Tidak Boleh Kosong'
                ]
            ],
            'province_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Propinsi Tidak Boleh Kosong'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $tenant_id      = $this->request->getPost('tenant_id');
        $tenant_name    = $this->request->getPost('tenant_name');
        $email          = $this->request->getPost('email');
        $passwd         = $this->request->getPost('passwd');
        $confirm_passwd = $this->request->getPost('confirm_passwd');
        $phone          = $this->request->getPost('phone');
        $city_name      = $this->request->getPost('city_name');
        $province_name  = $this->request->getPost('province_name');
        $facebook       = !empty($this->request->getPost('facebook')) ? $this->request->getPost('facebook') : '';
        $instagram      = !empty($this->request->getPost('instagram')) ? $this->request->getPost('instagram') : '';
        $linkedin       = !empty($this->request->getPost('linkedin')) ? $this->request->getPost('linkedin') : '';
        $twitter        = !empty($this->request->getPost('twitter')) ? $this->request->getPost('twitter') : '';
        $youtube        = !empty($this->request->getPost('youtube')) ? $this->request->getPost('youtube') : '';
        $tiktok         = !empty($this->request->getPost('tiktok')) ? $this->request->getPost('tiktok') : '';
        $tokopedia      = !empty($this->request->getPost('tokopedia')) ? $this->request->getPost('tokopedia') : '';
        $lazada         = !empty($this->request->getPost('lazada')) ? $this->request->getPost('lazada') : '';
        $shopee         = !empty($this->request->getPost('shopee')) ? $this->request->getPost('shopee') : '';
        $blibli         = !empty($this->request->getPost('blibli')) ? $this->request->getPost('blibli') : '';
        
        // check existing email except softdelete
        $tenant = $this->tenantModel->where('email', $email)->first();
        if ($tenant) {
            $validation = $this->validate([
                'email' => [
                    'rules' => 'is_unique[tenant.email]',
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
            'tenant_name'   => $tenant_name,
            'email'         => $email,
            'passwd'        => $passwd,
            'phone'         => $phone,
            'city_name'     => $city_name,
            'province_name' => $province_name,
            'facebook'      => $facebook,
            'instagram'     => $instagram,
            'linkedin'      => $linkedin,
            'twitter'       => $twitter,
            'youtube'       => $youtube,
            'tiktok'        => $tiktok,
            'tokopedia'     => $tokopedia,
            'lazada'        => $lazada,
            'shopee'        => $shopee,
            'blibli'        => $blibli,
            'status'        => 'ACTIVE'
        ];
        $id = $this->tenantModel->insert($data);

        if ($id) {
            return redirect()->to('admin/tenant')->with('success', 'Tenant berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Tenant gagal ditambahkan.');
        }
    }

    public function edit($id)
    {
        $tenant_id = $this->encrypter->decrypt(hex2bin($id));
        $tenant = $this->tenantModel->where('tenant_idx', $tenant_id)->first();
        session()->set(['email' => $tenant['email']]);

        $data = [
            'tenant_idx'    => bin2hex($this->encrypter->encrypt($tenant['tenant_idx'])),
            'tenant_name'   => $tenant['tenant_name'],
            'email'         => $tenant['email'],
            'phone'         => $tenant['phone'],
            'city_idx'      => $tenant['city_idx'],
            'province_idx'  => $tenant['province_idx'],
            'facebook'      => $tenant['facebook'],
            'instagram'     => $tenant['instagram'],
            'linkedin'      => $tenant['linkedin'],
            'twitter'       => $tenant['twitter'],
            'youtube'       => $tenant['youtube'],
            'tiktok'        => $tenant['tiktok'],
            'tokopedia'     => $tenant['tokopedia'],
            'lazada'        => $tenant['lazada'],
            'shopee'        => $tenant['shopee'],
            'blibli'        => $tenant['blibli'],
            'status'        => $tenant['status'],
            'province'      => $this->provinceModel->findAll(),
            'city'          => $this->cityModel->findAll(),
            'url'           => base_url('admin/update-tenant'),
            'btn_text'      => 'Update',
            'header_text'  => 'Update'
        ];
        return view('admin/create_tenant', $data);
    }

    public function update()
    {
        $validation = $this->validate([
            'tenant_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Brand Tidak Boleh Kosong',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_email' => 'Format Email Salah',
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Selular Tidak Boleh Kosong',
                    'numeric' => 'Nomor Selular Hanya Angka'
                ]
            ],
            'city_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kota Tidak Boleh Kosong'
                ]
            ],
            'province_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Propinsi Tidak Boleh Kosong'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $tenant_id      = $this->request->getPost('tenant_id');
        $tenant_id      = $this->encrypter->decrypt(hex2bin($tenant_id));
        $tenant_name    = $this->request->getPost('tenant_name');
        $email          = $this->request->getPost('email');
        $passwd         = !empty($this->request->getPost('passwd')) ? $this->request->getPost('passwd') : '';
        $confirm_passwd = !empty($this->request->getPost('confirm_passwd')) ? $this->request->getPost('confirm_passwd') : '';
        $phone          = $this->request->getPost('phone');
        $city_name      = $this->request->getPost('city_name');
        $province_name  = $this->request->getPost('province_name');
        $facebook       = !empty($this->request->getPost('facebook')) ? $this->request->getPost('facebook') : '';
        $instagram      = !empty($this->request->getPost('instagram')) ? $this->request->getPost('instagram') : '';
        $linkedin       = !empty($this->request->getPost('linkedin')) ? $this->request->getPost('linkedin') : '';
        $twitter        = !empty($this->request->getPost('twitter')) ? $this->request->getPost('twitter') : '';
        $youtube        = !empty($this->request->getPost('youtube')) ? $this->request->getPost('youtube') : '';
        $tiktok         = !empty($this->request->getPost('tiktok')) ? $this->request->getPost('tiktok') : '';
        $tokopedia      = !empty($this->request->getPost('tokopedia')) ? $this->request->getPost('tokopedia') : '';
        $lazada         = !empty($this->request->getPost('lazada')) ? $this->request->getPost('lazada') : '';
        $shopee         = !empty($this->request->getPost('shopee')) ? $this->request->getPost('shopee') : '';
        $blibli         = !empty($this->request->getPost('blibli')) ? $this->request->getPost('blibli') : '';

        // check existing email except softdelete
        // jika email != session email
        if (!empty($email) && $email != session()->get('email')) {
            $tenant = $this->tenantModel->where('email', $email)->first();
            if ($tenant) {
                $validation = $this->validate([
                    'email' => [
                        'rules' => 'is_unique[tenant.email]',
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

        if (!empty($passwd)) {
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
            ]); //rules;

            if (!$validation) {
                return redirect()->back()->withInput();
            }

            $data['passwd'] = $passwd; 
        }
        
        $data = [
            'tenant_name'   => $tenant_name,
            'email'         => $email,
            'phone'         => $phone,
            'city_name'     => $city_name,
            'province_name' => $province_name,
            'facebook'      => $facebook,
            'instagram'     => $instagram,
            'linkedin'      => $linkedin,
            'twitter'       => $twitter,
            'youtube'       => $youtube,
            'tiktok'        => $tiktok,
            'tokopedia'     => $tokopedia,
            'lazada'        => $lazada,
            'shopee'        => $shopee,
            'blibli'        => $blibli
        ];
        $this->tenantModel->update($tenant_id, $data);

        return redirect()->to('admin/tenant')->with('success', 'Tenant berhasil diupdate.');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $tenant_idx = $this->encrypter->decrypt(hex2bin($id));
            $tenant = $this->tenantModel->where('tenant_idx', $tenant_idx)->first();

            if (!$tenant) {
                return redirect()->to('admin/tenant')->with('error', 'Data Tenant Tidak Ditemukan');
            }

            // delete tenant
            $this->tenantModel->delete($tenant_idx);    

            return redirect()->to('admin/tenant')->with('success', 'Data Tenant Berhasil Dihapus');
        }
    }

    public function ajax_city($id)
    {
        $kota = $this->cityModel->where('province_idx', $id)->findAll();
        $data = "<option value=''>-- Pilih Kota/Kabupaten --</option>";
        foreach ($kota as $row) {
            $data .= '<option value="'.$row['city_idx'].'">'. $row['city_name'].'</option>';
        }
        echo $data;
    }

    public function ajax_tenant_list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $table = 'tenant';
            $where = '';
            $orWhere = '';
            $column_order = array();
            $column_search = array();
            $order = array($table.'.created_at' => 'desc');
            $lists = $this->tenantModel->get_datatables($table, $column_order, $column_search, $order, $where, $orWhere);
            $data = array();
            $no = $this->request->getPost("start");

            foreach ($lists as $list) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = '<a href="'.base_url('admin/edit-tenant/'.bin2hex($this->encrypter->encrypt($list->tenant_idx))).'" title="Edit Tenant">'.$list->tenant_name.'</a>';
                $row[] = $list->email;
                $row[] = $list->phone;
                $row[] = $list->city_name;
                $row[] = $list->province;
                $row[] = $list->facebook;
                $row[] = $list->instagram;
                $row[] = $list->linkedin;
                $row[] = $list->twitter;
                $row[] = $list->youtube;
                $row[] = $list->tiktok;
                $row[] = $list->tokopedia;
                $row[] = $list->lazada;
                $row[] = $list->shopee;
                $row[] = $list->blibli;
                $row[] = $list->status;
                $row[] = date('d-m-Y', strtotime($list->created_at));
                $list->action = "<a data-toggle=\"confirm\" data-title=\"Konfirmasi\" data-text=\"Yakin Tenant Dihapus ?\" href=\"". base_url('admin/delete-tenant/'.bin2hex($this->encrypter->encrypt($list->tenant_idx))) ."\"><i class=\"fas fa-trash\"></i></a>";
                $row[] = $list->action;
                $data[] = $row;
            }

            $output = array(
                "draw" => $this->request->getPost("draw"),
                "recordsTotal" => $this->tenantModel->count_all($table, $where),
                "recordsFiltered" => $this->tenantModel->count_filtered($table, $column_order, $column_search, $order, $where),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }
}
