<?php

namespace App\Controllers\Tenant;

use App\Controllers\BaseController;
use App\Models\Tenant\ProductModel;
use App\Models\Admin\CategoryModel;
use Config\Services;

class Product extends BaseController
{
    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        return view('tenant/product');
    }

    public function create()
    {
        $categories = $this->getCategoryTree(0);
        // echo '<pre>', print_r($categories), die();

        $data = [
            'product_idx'  => '',
            'product_name' => '',
            'slug'         => '',
            'category_id'  => '',
            'status'       => '',
            'category'     => $categories,
            'btn_text'     => 'Simpan',
            'header_text'  => 'Tambah'
        ];
        
        return view('tenant/create_product', $data);
    }

    public function getCategoryTree($parent_id = 0) {
        $categories = array();
        $result = $this->categoryModel->where('parent_idx', $parent_id)->findAll();

        foreach ($result as $mainCategory) {
          $category = array();
          $category['category_idx'] = $mainCategory['category_idx'];
          $category['category_name'] = $mainCategory['category_name'];
          $category['sub_categories'] = $this->getCategoryTree($category['category_idx']);
          $categories[$mainCategory['category_idx']] = $category;
        }
        return $categories;
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
        $tenant_id    = session()->get('loggedAs') == 'admin' ? 0 : session()->get('user_idx');

        $data = [
            'banner_name'  => $banner_name,
            'banner_image' => $filename,
            'position'     => $position,
            'tenant_idx'   => $tenant_id,
            'status'       => $status,
        ];

        // upload file banner_image
        $banner_image->move(FCPATH.'assets/uploads/products/', $filename);

        $id = $this->productModel->insert($data);

        if ($id) {
            return redirect()->to('tenant/product')->with('success', 'Produk berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Produk gagal ditambahkan.');
        }
    }

    public function edit($id)
    {
        $product_id = $this->encrypter->decrypt(hex2bin($id));
        $product = $this->productModel->where('product_idx', $product_id)->first();
        
        $data = [
            'product_idx'   => bin2hex($this->encrypter->encrypt($product['product_idx'])),
            'banner_name'  => $product['banner_name'],
            'banner_image' => base_url('assets/uploads/banner/'.$product['banner_image']),
            'position'     => $product['position'],
            'status'       => $product['status'],
            'btn_text'     => 'Update',
            'header_text'  => 'Update'
        ];
        
        return view('admin/create_banner', $data);
    }

    public function update()
    {
        $validation = $this->validate([
            'banner_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Banner ID Tidak Boleh Kosong'
                ]
            ],
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
     
        $banner_id    = $this->request->getPost('banner_id');
        $banner_id    = $this->encrypter->decrypt(hex2bin($banner_id));
        $banner_name  = $this->request->getPost('banner_name');
        $position     = $this->request->getPost('position');
        $status       = $this->request->getPost('status');
        $banner_image = $this->request->getFile('banner_image');
        $tenant_id    = session()->get('loggedAs') == 'admin' ? 0 : session()->get('user_idx');
        
        if (!empty($banner_image->getName())) {
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
        
        $data['banner_name'] = $banner_name;
        $data['position']    = $position;
        $data['status']      = $status;
        $data['tenant_idx']  = $tenant_id;
        $this->productModel->update($banner_id, $data);

        return redirect()->to('tenant/produxt')->with('success', 'Product berhasil diupdate.');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $product_idx = $this->encrypter->decrypt(hex2bin($id));
            $product = $this->productModel->where('product_idx', $product_idx)->first();

            if (!$product) {
                return redirect()->to('tenant/product')->with('error', 'Data Produk Tidak Ditemukan');
            }

            // delete tenant
            $this->productModel->delete($product_idx);    

            return redirect()->to('tenant/product')->with('success', 'Data Produk Berhasil Dihapus');
        }
    }

    public function ajax_product_list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $table = 'products';
            $where = ['deleted_at' => NULL, 'tenant_idx' => session()->get('user_idx')];
            $orWhere = '';
            $column_order = array();
            $column_search = array();
            $order = array('created_at' => 'desc');
            $lists = $this->productModel->get_datatables($table, $column_order, $column_search, $order, $where, $orWhere);
            $data = array();
            $no = $this->request->getPost("start");

            foreach ($lists as $list) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = '<a href="'.base_url('tenant/edit-product/'.bin2hex($this->encrypter->encrypt($list->product_idx))).'" title="Edit Product">'.$list->product_name.'</a>';
                $row[] = $list->slug;
                $category = $this->categoryModel->select('category_name')->where('category_idx', $list->category_id)->first();
                $list->category_name = $category['category_name'];
                $row[] = $list->category_name;
                $list->action = "<a data-toggle=\"confirm\" data-title=\"Konfirmasi\" data-text=\"Yakin Produk Dihapus ?\" href=\"". base_url('tenant/delete-product/'.bin2hex($this->encrypter->encrypt($list->product_idx))) ."\"><i class=\"fas fa-trash\"></i></a>";
                $row[] = $list->action;
                $data[] = $row;
            }

            $output = array(
                "draw" => $this->request->getPost("draw"),
                "recordsTotal" => $this->productModel->count_all($table, $where),
                "recordsFiltered" => $this->productModel->count_filtered($table, $column_order, $column_search, $order, $where),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }
}
