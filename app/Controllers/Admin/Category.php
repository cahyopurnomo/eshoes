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
        return view('admin/category');
    }

    public function create()
    {
        $categories = $this->getCategoryTree(0);

        $data = [
            'category'     => $categories,
            'parent_idx'   => '',
            'url'          => base_url('admin/save-category'),
            'btn_text'     => 'Simpan',
            'header_text'  => 'Tambah'
        ];
        return view('admin/create_category', $data);
    }

    public function getCategoryTree($parent_id = 0) {
        $categories = array();
        $result = $this->categoryModel->where('parent_idx', $parent_id)->findAll();

        foreach ($result as $mainCategory) {
          $category = array();
          $category['category_idx'] = $mainCategory['category_idx'];
          $category['category_name'] = $mainCategory['category_name'];
          if (!empty($this->getCategoryTree($category['category_idx']))) {
                $category['sub_categories'] = $this->getCategoryTree($category['category_idx']);
          }
          $categories[$mainCategory['category_idx']] = $category;
        }
        return $categories;
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
                ],
            'category_image' => [
                'rules' => 'uploaded[category_image]|mime_in[category_image,image/jpg,image/jpeg,image/gif,image/png]|max_size[category_image,100]|is_image[category_image]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in'  => 'File Extention Harus Berupa jpg, jpeg, gif, png',
                    'max_size' => 'Ukuran File Maksimal 100KB',
                    'is_image' => 'Format file tidak diijinkan',
                ]
            ],
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $parent_id      = $this->request->getPost('parent_category');
        $category_name  = $this->request->getPost('category_name');
        $category_image = $this->request->getFile('category_image');
        $category_slug  = $this->createUrlSlug($category_name);
        $filename       = $category_image->getName();
        
        // upload file logo
        $category_image->move(FCPATH.'assets/uploads/logo/', $filename);

        $data = [
            'parent_idx'     => $parent_id,
            'category_name'  => $category_name,
            'category_slug'  => $category_slug,
            'category_image' => $filename
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
        $categories = $this->getCategoryTree(0);

        $data = [
            'category_idx'      => bin2hex($this->encrypter->encrypt($category['category_idx'])),
            'category'          => $categories,
            'parent_idx'        => $category['parent_idx'],
            'category_name'     => $category['category_name'],
            'category_image'    => !empty($category['category_image']) ? base_url('assets/uploads/logo/'.$category['category_image']) : '',
            'url'               => base_url('admin/update-category'),
            'btn_text'          => 'Update',
            'header_text'       => 'Update'
        ];
        return view('admin/create_category', $data);
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
        $category_slug  = $this->createUrlSlug($category_name);
        $category_image = $this->request->getFile('category_image');

        if (!empty($category_image->getName())) {
            $validation = $this->validate([
                'category_image' => [
                    'rules' => 'uploaded[category_image]|mime_in[category_image,image/jpg,image/jpeg,image/gif,image/png]|max_size[category_image,100]|is_image[category_image]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in'  => 'File Extention Harus Berupa jpg, jpeg, gif, png',
                        'max_size' => 'Ukuran File Maksimal 100KB',
                        'is_image' => 'Format file tidak diijinkan',
                    ]
                ]
            ]); //rules
    
            if (!$validation) {
                return redirect()->back()->withInput();
            }
            
            $filename = $category_image->getName();
            $data['category_image'] = $filename;
            // upload file logo
            $category_image->move(FCPATH.'assets/uploads/logo/', $filename);
        }
        
        $data['parent_idx'] = $parent_id;
        $data['category_name'] = $category_name;
        $data['category_slug'] = $category_slug;
        
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
            $column_order = ['c1.category_name'];
            $column_search = ['c1.category_name'];
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

    function createUrlSlug($urlString)
    {
        //unused
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($urlString));
        return $slug;
    }
}
