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
        return view('Admin/banner');
    }

    public function create()
    {
        $data = [
            'url'          => base_url('admin/save-banner'),
            'btn_text'     => 'Simpan',
            'header_text'  => 'Tambah'
        ];
        return view('Admin/create_banner', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'banner_name' => [
                'rules' => 'required|is_unique[banner.banner_name]',
                'errors' => [
                    'required' => 'Nama Kategori Tidak Boleh Kosong',
                    'is_unique' => 'Nama Kategori Sudah Ada'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $parent_id      = $this->request->getPost('parent_category');
        $category_name  = $this->request->getPost('category_name');
        
        $data = [
            'parent_idx'    => $parent_id,
            'category_name' => $category_name
        ];
        $id = $this->categoryModel->insert($data);

        if ($id) {
            return redirect()->to('admin/category')->with('success', 'Kategori berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Kategori gagal ditambahkan.');
        }
    }

    public function edit($id)
    {
        $category_id = $this->encrypter->decrypt(hex2bin($id));
        $category = $this->categoryModel->where('category_idx', $category_id)->first();
        
        $data = [
            'category_idx'  => bin2hex($this->encrypter->encrypt($category['category_idx'])),
            'parent'        => $this->categoryModel->findAll(),
            'parent_idx'    => $category['parent_idx'],
            'category_name' => $category['category_name'],
            'url'           => base_url('admin/update-category'),
            'btn_text'      => 'Update',
            'mode'          => 'edit',
            'header_text'   => 'Update'
        ];
        return view('Admin/create_category', $data);
    }

    public function update()
    {
        $validation = $this->validate([
            'category_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori Tidak Boleh Kosong',
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $category_id    = $this->request->getPost('category_id');
        $category_id    = $this->encrypter->decrypt(hex2bin($category_id));
        $parent_id      = $this->request->getPost('parent_category');
        $category_name  = $this->request->getPost('category_name');
        
        $data = [
            'parent_idx'    => $parent_id,
            'category_name' => $category_name,
        ];
        $this->categoryModel->update($category_id, $data);

        return redirect()->to('admin/category')->with('success', 'Kategori berhasil diupdate.');
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
                $row[] = '<img src="'.base_url('assets/uploads/'.$list->image).'">';
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
