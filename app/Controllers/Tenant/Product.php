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

        $data = [
            'product_idx'  => '',
            'product_name' => '',
            'slug'         => '',
            'category_id'  => '',
            'status'       => '',
            'image1'       => base_url('assets/uploads/banner/no-image.jpg'),
            'image2'       => base_url('assets/uploads/banner/no-image.jpg'),
            'image3'       => base_url('assets/uploads/banner/no-image.jpg'),
            'category'     => $categories,
            'url_save'     => base_url('tenant/save-product'),
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
            'product_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judl Produk Tidak Boleh Kosong'
                ]
            ],
            'slug' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Slug Produk Tidak Boleh Kosong'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Tidak Boleh Kosong'
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Tidak Boleh Kosong'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Tidak Boleh Kosong'
                ]
            ],
            'image1' => [
                'rules' => 'uploaded[image1]|mime_in[image1,image/jpg,image/jpeg,image/gif,image/png]|max_size[image1,500]|is_image[image1]',
                'errors' => [
                    'uploaded' => 'Harus ada file yang diupload',
					'mime_in'  => 'File Extention Harus Berupa jpg, jpeg, gif, png',
					'max_size' => 'Ukuran file maksimal 500KB',
                    'is_image' => 'Format file tidak diijinkan'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $product_name = $this->request->getPost('product_name');
        $slug         = $this->request->getPost('slug');
        $description  = $this->request->getPost('description');
        $category_id  = $this->request->getPost('category');
        $status       = $this->request->getPost('status');
        $image1       = $this->request->getFile('image1');
        $image2       = $this->request->getFile('image2');
        $image3       = $this->request->getFile('image3'); 

        $data = [
            'product_name'  => $product_name,
            'slug'          => $slug,
            'description'   => $description,
            'category_idx'  => $category_id,
            'status'        => $status,
            'tenant_idx'    => session()->get('user_idx'),
            'image1'        => !empty($image1->getName()) ? $image1->getName() : '',
            'image2'        => !empty($image2->getName()) ? $image2->getName() : '',
            'image3'        => !empty($image3->getName()) ? $image3->getName() : '',
        ];

        if (!empty($image1->getName())) {
            $filename = $slug.'-1.'.$image1->getClientExtension();
            $image1->move(FCPATH.'assets/uploads/products/', $filename);
        }

        if (!empty($image2->getName())) {
            $filename = $slug.'-2.'.$image2->getClientExtension();
            $image2->move(FCPATH.'assets/uploads/products/', $filename);
        }

        if (!empty($image3->getName())) {
            $filename = $slug.'-3.'.$image3->getClientExtension();
            $image3->move(FCPATH.'assets/uploads/products/', $filename);
        }

        $id = $this->productModel->insert($data);

        if ($id) {
            return redirect()->to('tenant/product')->with('success', 'Produk berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Produk gagal ditambahkan.');
        }
    }

    function createUrlSlug($urlString)
    {
        //unused
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }

    public function edit($id)
    {
        $product_id = $this->encrypter->decrypt(hex2bin($id));
        $product = $this->productModel->where('product_idx', $product_id)->first();
        $categories = $this->getCategoryTree(0);

        $data = [
            'product_idx'  => bin2hex($this->encrypter->encrypt($product['product_idx'])),
            'product_name' => $product['product_name'],
            'slug'         => $product['slug'],
            'category_id'  => $product['category_idx'],
            'description'  => $product['description'],
            'image1'       => !empty($product['image1']) ? base_url('assets/uploads/products/'.$product['image1']) : base_url('assets/uploads/banner/no-image.jpg'),
            'image2'       => !empty($product['image2']) ? base_url('assets/uploads/products/'.$product['image2']) : base_url('assets/uploads/banner/no-image.jpg'),
            'image3'       => !empty($product['image3']) ? base_url('assets/uploads/products/'.$product['image3']) : base_url('assets/uploads/banner/no-image.jpg'),
            'status'       => $product['status'],
            'category'     => $categories,
            'url_save'     => base_url('tenant/update-product'),
            'btn_text'     => 'Update',
            'header_text'  => 'Update'
        ];
        
        return view('tenant/create_product', $data);
    }

    public function update()
    {
        $validation = $this->validate([
            'product_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judl Produk Tidak Boleh Kosong'
                ]
            ],
            'slug' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Slug Produk Tidak Boleh Kosong'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Tidak Boleh Kosong'
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Tidak Boleh Kosong'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Tidak Boleh Kosong'
                ]
            ]
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $product_id   = $this->request->getPost('product_id');
        $product_id    = $this->encrypter->decrypt(hex2bin($product_id));
        $product_name = $this->request->getPost('product_name');
        $slug         = $this->request->getPost('slug');
        $description  = $this->request->getPost('description');
        $category_id  = $this->request->getPost('category');
        $status       = $this->request->getPost('status');
        $image1       = $this->request->getFile('image1');
        $image2       = $this->request->getFile('image2');
        $image3       = $this->request->getFile('image3'); 

        $data = [
            'product_name'  => $product_name,
            'slug'          => $slug,
            'description'   => $description,
            'category_idx'  => $category_id,
            'status'        => $status,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];
        
        if (!empty($image1->getName())) {
            $validation = $this->validate([
                'image1' => [
                    'rules' => 'uploaded[image1]|mime_in[image1,image/jpg,image/jpeg,image/gif,image/png]|max_size[image1,500]|is_image[image1]',
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
            
            $filename = $slug.'-1.'.$image1->getClientExtension();
            $image1->move(FCPATH.'assets/uploads/products/', $filename);
            $data['image1'] = $filename;
        }

        if (!empty($image2->getName())) {
            $validation = $this->validate([
                'image2' => [
                    'rules' => 'uploaded[image2]|mime_in[image2,image/jpg,image/jpeg,image/gif,image/png]|max_size[image2,500]|is_image[image2]',
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
         
            $filename = $slug.'-2.'.$image2->getClientExtension();
            $image2->move(FCPATH.'assets/uploads/products/', $filename);
            $data['image2'] = $filename;
        }

        if (!empty($image3->getName())) {
            $validation = $this->validate([
                'image3' => [
                    'rules' => 'uploaded[image3]|mime_in[image3,image/jpg,image/jpeg,image/gif,image/png]|max_size[image3,500]|is_image[image3]',
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
            
            $filename = $slug.'-3.'.$image3->getClientExtension();
            $image3->move(FCPATH.'assets/uploads/products/', $filename);
            $data['image3'] = $filename;
        }
        
        $this->productModel->update($product_id, $data);

        return redirect()->to('tenant/product')->with('success', 'Product berhasil diupdate.');
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

    public function delete_image($order, $product_id)
    {
        if (!empty($order) && !empty($product_id)) {
            $product_idx = $this->encrypter->decrypt(hex2bin($product_id));
            $product = $this->productModel->where('product_idx', $product_idx)->first();

            if (!$product) {
                return redirect()->back()->withInput()->with('error', 'Data Produk Tidak Ditemukan');
            }

            $this->productModel->set('image'.$order, '')->where('product_idx', $product_idx)->update();

            return redirect()->to('tenant/product')->with('success', 'Gambar '.$order.' Berhasil Dihapus');
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
                $category = $this->categoryModel->select('category_name')->where('category_idx', $list->category_idx)->first();
                $list->category_name = $category['category_name'];
                $row[] = $list->category_name;
                $list->status = $list->status == 'ON' ? 'AKTIF' : 'TIDAK AKTIF';
                $row[] = $list->status;
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
