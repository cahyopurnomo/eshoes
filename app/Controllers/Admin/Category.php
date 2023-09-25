<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use Config\Services;

class Category extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        return view('Admin/category');
    }

    public function create()
    {
        $data = [
            'parent'       => $this->categoryModel->findAll(),
            'url'          => base_url('admin/save-category'),
            'btn_text'     => 'Simpan',
            'header_text'  => 'Tambah'
        ];
        return view('Admin/create_category', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'category_name' => [
                'rules' => 'required|is_unique[category.category_name]',
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
            $category_idx = $this->encrypter->decrypt(hex2bin($id));
            $category = $this->categoryModel->where('category_idx', $category_idx)->first();

            if (!$category) {
                return redirect()->to('admin/category')->with('error', 'Data Kategori Tidak Ditemukan');
            }

            // delete tenant
            $this->categoryModel->delete($category_idx);    

            return redirect()->to('admin/category')->with('success', 'Data Kategori Berhasil Dihapus');
        }
    }

    public function ajax_category_list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $table = 'category c1';
            $where = 'c1.deleted_at IS NULL';
            $orWhere = '';
            $column_order = array();
            $column_search = array();
            $order = array('c1.created_at' => 'desc');
            $lists = $this->categoryModel->get_datatables($table, $column_order, $column_search, $order, $where, $orWhere);
            $data = array();
            $no = $this->request->getPost("start");

            foreach ($lists as $list) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = '<a href="'.base_url('admin/edit-category/'.bin2hex($this->encrypter->encrypt($list->category_idx))).'" title="Edit Kategori">'.$list->category_name.'</a>';
                $row[] = $list->parent_category;
                $list->action = "<a data-toggle=\"confirm\" data-title=\"Konfirmasi\" data-text=\"Yakin Kategori Dihapus ?\" href=\"". base_url('admin/delete-category/'.bin2hex($this->encrypter->encrypt($list->category_idx))) ."\"><i class=\"fas fa-trash\"></i></a>";
                $row[] = $list->action;
                $data[] = $row;
            }

            $output = array(
                "draw" => $this->request->getPost("draw"),
                "recordsTotal" => $this->categoryModel->count_all($table, $where),
                "recordsFiltered" => $this->categoryModel->count_filtered($table, $column_order, $column_search, $order, $where),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }
}
