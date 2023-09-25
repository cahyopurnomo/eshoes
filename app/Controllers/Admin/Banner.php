<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BannerModel;
use Config\Services;

class Banner extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->bannerModel = new BannerModel();
    }

    public function index()
    {
        return view('admin/banner');
    }

    public function create()
    {
        $data = [
            'url'          => base_url('admin/save-banner'),
            'banner_name'  => '',
            'banner_image' => '',
            'position'     => '',
            'status'       => '',
            'btn_text'     => 'Simpan',
            'header_text'  => 'Tambah'
        ];
        return view('admin/create_banner', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'banner_name' => [
                'rules' => 'required|is_unique[banner.banner_name]',
                'errors' => [
                    'required' => 'Nama Banner Tidak Boleh Kosong',
                    'is_unique' => 'Nama Banner Sudah Ada'
                ]
            ],
            'banner_image' => [
                'rules' => 'uploaded[banner_image]|mime_in[banner_image,image/jpg,image/jpeg,image/gif,image/png]|max_size[banner_image,500]|is_image[banner_image]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
					'mime_in'  => 'File Extention Harus Berupa jpg, jpeg, gif, png',
					'max_size' => 'Ukuran File Maksimal 500KB',
                    'is_image' => 'Format file tidak diijinkan',
                ]
            ],
            'position' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Posisi Banner Tidak Boleh Kosong'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Banner Tidak Boleh Kosong'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $banner_name  = $this->request->getPost('banner_name');
        $position     = $this->request->getPost('position');
        $status       = $this->request->getPost('status');
        $banner_image = $this->request->getFile('banner_image');
        $filename     = $banner_image->getName();
        
        $data = [
            'banner_name'  => $banner_name,
            'banner_image' => $filename,
            'position'     => $position,
            'tenant_idx'   => 0,
            'status'       => $status,
        ];

        // upload file banner_image
        $banner_image->move(FCPATH.'assets/uploads/banner/', $filename);

        $id = $this->bannerModel->insert($data);

        if ($id) {
            return redirect()->to('admin/banner')->with('success', 'Banner berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Banner gagal ditambahkan.');
        }
    }

    public function edit($id)
    {
        $banner_id = $this->encrypter->decrypt(hex2bin($id));
        $banner = $this->bannerModel->where('banner_idx', $banner_id)->first();
        
        $data = [
            'banner_idx'   => bin2hex($this->encrypter->encrypt($banner['banner_idx'])),
            'banner_name'  => $banner['banner_name'],
            'banner_image' => base_url('assets/uploads/banner/'.$banner['banner_image']),
            'position'     => $banner['position'],
            'status'       => $banner['status'],
            'btn_text'     => 'Update',
            'header_text'  => 'Update'
        ];
        return view('admin/create_banner', $data);
    }

    public function update()
    {
        $validation = $this->validate([
            'banner_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Banner Tidak Boleh Kosong'
                ]
            ],
            'position' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Posisi Banner Tidak Boleh Kosong'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Banner Tidak Boleh Kosong'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $banner_id    = $this->encrypter->decrypt(hex2bin($banner_id));
        $banner_name  = $this->request->getPost('banner_name');
        $position     = $this->request->getPost('position');
        $status       = $this->request->getPost('status');
        $banner_image = $this->request->getFile('banner_image');
        
        if (!empty($banner_image)) {
            $validation = $this->validate([
                'banner_image' => [
                    'rules' => 'uploaded[banner_image]|mime_in[banner_image,image/jpg,image/jpeg,image/gif,image/png]|max_size[banner_image,500]|is_image[banner_image]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in'  => 'File Extention Harus Berupa jpg, jpeg, gif, png',
                        'max_size' => 'Ukuran File Maksimal 500KB',
                        'is_image' => 'Format file tidak diijinkan',
                    ]
                ]
            ]); //rules
    
            if (!$validation) {
                return redirect()->back()->withInput();
            }
            
            $filename = $banner_image->getName();
            $data['banner_image'] = $filename;
        }

        $data = [
            'banner_name'  => $banner_name,
            'position'     => $position,
            'tenant_idx'   => 0,
            'status'       => $status,
        ];
        $this->bannerModel->update($banner_id, $data);

        return redirect()->to('admin/banner')->with('success', 'Banner berhasil diupdate.');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $banner_idx = $this->encrypter->decrypt(hex2bin($id));
            $banner = $this->categoryModel->where('banner_idx', $banner_idx)->first();

            if (!$banner) {
                return redirect()->to('admin/banner')->with('error', 'Data Banner Tidak Ditemukan');
            }

            // delete tenant
            $this->bannerModel->delete($banner_idx);    

            return redirect()->to('admin/banner')->with('success', 'Data Banner Berhasil Dihapus');
        }
    }

    public function ajax_banner_list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $table = 'banner';
            $where = 'deleted_at IS NULL';
            $orWhere = '';
            $column_order = array();
            $column_search = array();
            $order = array('created_at' => 'desc');
            $lists = $this->bannerModel->get_datatables($table, $column_order, $column_search, $order, $where, $orWhere);
            $data = array();
            $no = $this->request->getPost("start");

            foreach ($lists as $list) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = '<a href="'.base_url('admin/edit-banner/'.bin2hex($this->encrypter->encrypt($list->banner_idx))).'" title="Edit Banner">'.$list->banner_name.'</a>';
                $row[] = '<img style="width: 100%; max-width: 200px;" src="'.base_url('assets/uploads/banner/'.$list->banner_image).'">';
                $row[] = $list->position;
                $row[] = $list->status;
                $list->action = "<a data-toggle=\"confirm\" data-title=\"Konfirmasi\" data-text=\"Yakin Banner Dihapus ?\" href=\"". base_url('admin/delete-banner/'.bin2hex($this->encrypter->encrypt($list->banner_idx))) ."\"><i class=\"fas fa-trash\"></i></a>";
                $row[] = $list->action;
                $data[] = $row;
            }

            $output = array(
                "draw" => $this->request->getPost("draw"),
                "recordsTotal" => $this->bannerModel->count_all($table, $where),
                "recordsFiltered" => $this->bannerModel->count_filtered($table, $column_order, $column_search, $order, $where),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }
}
