<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Tenant\ProductModel;
use App\Models\Admin\TenantModel;
use App\Models\Admin\BannerModel;

use Config\Services;

class Main extends BaseController
{
    public function __construct()
    {
        $this->request = Services::request();
        $this->encrypter = \Config\Services::encrypter();
        $this->tenantModel = new TenantModel();
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->bannerModel = new BannerModel();
    }

    public function index()
    {
        $categories = $this->getCategoryTree(0);
        $banner = $this->bannerModel->select('banner_image')
                                    ->where('tenant_idx', 0)
                                    ->where('status', 'ON')
                                    ->findAll();

        $tenant = $this->tenantModel->select('tenant_idx, tenant_name, logo')
                                    ->where('status', 'ACTIVE')
                                    ->findAll();
        
        $product = $this->productModel->select('products.product_idx, products.product_name, products.slug, products.image1, products.price, tenant.tenant_name, tenant.logo, province.province')
                                      ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'LEFT')
                                      ->join('province', 'tenant.province_idx = province.province_idx', 'LEFT')
                                      ->where('products.status', 'ON')
                                      ->paginate(12, 'item');

        // acak result biar ga bosen
        shuffle($categories);
        shuffle($banner);
        shuffle($tenant);
        shuffle($product);

        $data = [
            'category'  => $categories,
            'banner'    => $banner,
            'tenant'    => $tenant,
            'product'   => $product,
            'pager'     => $this->productModel->pager
        ];

        return view('frontend/main', $data);
    }

    public function getCategoryTree($parent_id = 0) {
        $categories = array();
        $result = $this->categoryModel->where('parent_idx', $parent_id)->findAll();

        foreach ($result as $mainCategory) {
          $category = array();
          $category['category_idx'] = $mainCategory['category_idx'];
          $category['category_name'] = $mainCategory['category_name'];
          $category['category_image'] = $mainCategory['category_image'];
          if (!empty($this->getCategoryTree($category['category_idx']))) {
                $category['sub_categories'] = $this->getCategoryTree($category['category_idx']);
          }
          $categories[$mainCategory['category_idx']] = $category;
        }
        return $categories;
    }

    public function about_us()
    {
        $segment = $this->request->uri->getSegment(1);
        $categories = $this->getCategoryTree(0);

        $data = [
            'category'  => $categories,
            'segment'   => $segment
        ];
        return view('frontend/about_us', $data);
    }

    public function contact_us()
    {
        $categories = $this->getCategoryTree(0);

        $data = [
            'category' => $categories,
            'segment'  => '',
        ];
        return view('frontend/contact_us', $data);
    }

    public function submit_contact_us()
    {
        // SEND EMAIL TO ADMIN
        $email_admin = getenv('EMAIL_ADMIN');

        $validation = $this->validate([
            'firstname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Depan Tidak Boleh Kosong',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_email' => 'Format Email Salah'
                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Pesan Tidak Boleh Kosong',
                ]
            ],
            'message' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pesan Tidak Boleh Kosong',
                ]
            ],
        ]); //rules

        if (!$validation) {
            return redirect()->back()->withInput();
        }
     
        $firstname  = $this->request->getPost('firstname');
        $lastname   = $this->request->getPost('lastname');
        $email      = $this->request->getPost('email');
        $phone      = $this->request->getPost('phone');
        $title      = $this->request->getPost('title');
        $message    = $this->request->getPost('message');

        $data = 'Nama Lengkap: '.$firstname.' '.$lastname.'<br>';
        $data .= 'Phone: '.$phone.'<br>';
        $message = $data.'Pesan: '.$message;

        $data_email = [
            'to'      => $email,
            'subject' => $title,
            'message' => $message,
        ];
        send_email($data_email);
    
        return redirect()->back()->withInput()->with('success', 'Pesan Berhasil Kirimkan');
    }

    public function search_product()
    {
        
    }
}
