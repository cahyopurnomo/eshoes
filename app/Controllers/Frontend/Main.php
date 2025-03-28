<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Tenant\ProductModel;
use App\Models\Admin\TenantModel;
use App\Models\Admin\BannerModel;
use App\Models\Admin\ProvinceModel;

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
        $this->provinceModel = new ProvinceModel();
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

        //format tenant name into tenant-name
        foreach ($tenant as $key => $row) {
            if ($row['tenant_name']) {
                $tenant_name = strtolower($row['tenant_name']);
                $tenant_name = $this->createURLSlug($tenant_name);
                $tenant[$key]['brand_url'] = base_url('brand/'.$tenant_name);
            }
        }

        foreach ($product as $key => $row) {
            if ($row['tenant_name']) {
                $tenant_name = strtolower($row['tenant_name']);
                $tenant_name = $this->createURLSlug($tenant_name);
                
                $product[$key]['product_url'] = base_url('product/'.$tenant_name.'/'.$row['slug']);
            }
        }
        
        $category = $this->categoryModel->where('parent_idx', 0)->findAll();
        
        // acak result biar ga bosen
        shuffle($banner);
        shuffle($tenant);
        shuffle($product);

        $data = [
            'category'   => $categories,
            'categories' => $category,
            'banner'     => $banner,
            'tenant'     => $tenant,
            'product'    => $product,
            'pager'      => $this->productModel->pager
        ];

        return view('frontend/main', $data);
    }

    function createURLSlug($urlString)
    {
        //unused
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }

    public function getCategoryTree($parent_id = 0) {
        $categories = array();
        $result = $this->categoryModel->where('parent_idx', $parent_id)->findAll();

        foreach ($result as $mainCategory) {
          $category = array();
          $category['category_idx'] = $mainCategory['category_idx'];
          $category['parent_idx'] = $mainCategory['parent_idx'];
          $category['category_name'] = $mainCategory['category_name'];
          $category['category_slug'] = $this->createURLSlug(strtolower($mainCategory['category_name']));
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

    public function product_detail($brand, $slug)
    {
        // find brand
        $original_brand = $brand;
        $brand = str_replace('-', ' ', $brand);
        $tenant = $this->tenantModel->where('LOWER(tenant_name)', $brand)->first();

        if (!$tenant) {
            return redirect()->back()->with('error', 'Produk Tidak Ditemukan');
        }

        $categories = $this->getCategoryTree(0);

        // find product by slug
        $product = $this->productModel->select('products.product_idx, products.category_idx, products.product_name, category.category_slug, products.slug, products.description, products.image1, products.image2, products.image3, products.price, tenant.tenant_name, tenant.email, tenant.logo, tenant.phone, province.province, category.category_name')
                                      ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'LEFT')
                                      ->join('province', 'tenant.province_idx = province.province_idx', 'LEFT')
                                      ->join('category', 'category.category_idx = products.category_idx', 'LEFT')
                                      ->where('products.status', 'ON')
                                      ->where('products.slug', $slug)
                                      ->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Produk Tidak Ditemukan');
        }

        $related_product = $this->productModel->select('products.product_name, products.slug, products.description, products.image1, products.price, tenant.tenant_name, tenant.logo, province.province')
                                              ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'LEFT')
                                              ->join('province', 'tenant.province_idx = province.province_idx', 'LEFT')
                                              ->where('products.status', 'ON')
                                              ->where('products.category_idx', $product['category_idx'])
                                              ->findAll();
                                              
        //format tenant name into tenant-name
        foreach ($related_product as $key => $row) {
            if ($row['tenant_name']) {
                $product[$key]['tenant_name'] = $this->createURLSlug($row['tenant_name']);
            }
        }

        shuffle($related_product); //acak urutannya

        //replace 0 with 62
        $first = substr($product['phone'], 0, 1);
        if ($first == '0') {
            $product['phone'] = '62' . substr($product['phone'], 1);
        }

        $data = [
            'category'          => $categories,
            'tenant'            => $tenant,
            'product'           => $product,
            'brand_url'         => base_url('brand/'.$this->createURLSlug(strtolower($product['tenant_name']))),
            'related_product'   => $related_product,
        ];

        return view('frontend/product_detail', $data);
    }

    public function brand_detail($brand)
    {
        $brand = str_replace('-', ' ', $brand);
        $tenant = $this->tenantModel->select('tenant.*, province.province')
                                    ->join('province', 'tenant.province_idx = province.province_idx', 'LEFT')
                                    ->where('LOWER(tenant_name)', strtolower($brand))
                                    ->first();
               
        if (!$tenant) {
            return redirect()->back()->with('error', 'Brand Tidak Ditemukan');
        }

        //replace 0 with 62
        $first = substr($tenant['phone'], 0, 1);
        if ($first == '0') {
            $tenant['phone'] = '62' . substr($tenant['phone'], 1);
        }

        $banner1 = $this->bannerModel->select('banner_name, banner_image, position')
                                     ->where('tenant_idx', $tenant['tenant_idx'])
                                     ->where('position', 'BANNER 1')
                                     ->where('status', 'ON')
                                     ->findAll(3);
        $banner2 = $this->bannerModel->select('banner_name, banner_image, position')
                                     ->where('tenant_idx', $tenant['tenant_idx'])
                                     ->where('position', 'BANNER 2')
                                     ->where('status', 'ON')
                                     ->findAll(3);
        $banner3 = $this->bannerModel->select('banner_name, banner_image, position')
                                     ->where('tenant_idx', $tenant['tenant_idx'])
                                     ->where('position', 'BANNER 3')
                                     ->where('status', 'ON')
                                     ->findAll(3);
        $banner4 = $this->bannerModel->select('banner_name, banner_image, position')
                                     ->where('tenant_idx', $tenant['tenant_idx'])
                                     ->where('position', 'BANNER 4')
                                     ->where('status', 'ON')
                                     ->first();
        $banner5 = $this->bannerModel->select('banner_name, banner_image, position')
                                     ->where('tenant_idx', $tenant['tenant_idx'])
                                     ->where('position', 'BANNER 5')
                                     ->where('status', 'ON')
                                     ->first();
        $banner6 = $this->bannerModel->select('banner_name, banner_image, position')
                                     ->where('tenant_idx', $tenant['tenant_idx'])
                                     ->where('position', 'BANNER 6')
                                     ->where('status', 'ON')
                                     ->first();
            
        // sorting product
        $sort = $this->request->getVar('sort');
        $key = $value = '';
        if ($sort == 'newest') {
            $key = 'products.created_at';
            $value = 'desc';
        } else if ($sort == 'oldest') {
            $key = 'products.created_at';
            $value = 'asc';
        } else if ($sort == 'lower_price') {
            $key = 'products.price';
            $value = 'asc';
        } else if ($sort == 'higher_price') {
            $key = 'products.price';
            $value = 'desc';
        } else if ($sort == 'az') {
            $key = 'products.product_name';
            $value = 'asc';
        } else if ($sort == 'za') {
            $key = 'products.product_name';
            $value = 'desc';
        }

        $product = $this->productModel->select('products.product_idx, products.product_name, products.slug, products.image1, products.price, tenant.tenant_name, tenant.logo, province.province')
                                      ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'LEFT')
                                      ->join('province', 'tenant.province_idx = province.province_idx', 'LEFT')
                                      ->where('products.status', 'ON')
                                      ->where('products.tenant_idx', $tenant['tenant_idx'])
                                      ->orderBy($key, $value)
                                      ->paginate(12, 'item');
        
        $categories = $this->getCategoryTree(0);

        $data = [
            'category' => $categories,
            'tenant'   => $tenant,
            'banner1'  => $banner1,
            'banner2'  => $banner2,
            'banner3'  => $banner3,
            'banner4'  => $banner4,
            'banner5'  => $banner5,
            'banner6'  => $banner6,
            'product'  => $product,
            'pager'    => $this->productModel->pager
        ];

        return view('frontend/brand', $data);
    }

    public function all_product()
    {
        $where = [];
        $order_by = 'products.created_at';
        $order_value = 'desc';

        // GET CATEGORY
        $categoriesMenu = $this->getCategoryTree(0);

        // CATEGORY
        if (!empty($this->request->getGet('c'))) {
            $cat = $this->request->getGet('c');

            if ($cat != 'all') {
                // CEK DULU INI CATEGORY PARENT ATAU BUKAN
                $c = $this->categoryModel->select('category_idx, category_name, category_slug, parent_idx')
                                        ->where('category_slug', $cat)
                                        ->first();
                                        
                // JIKA CATEGORY ADALAH PARENT
                if ($c['parent_idx'] == 0) {
                    $where['category.parent_idx'] = $c['category_idx'];
                } else {
                    $where['category.category_slug'] = $c['category_slug'];
                }

                $category_selected = $c['category_name'];
                $category_slug_selected = $c['category_slug'];
            } else {
                $cat = 'all';
                $category_selected = 'All Kategori';
                $category_slug_selected = '';
            }
        }
        
        // BRAND
        if (!empty($this->request->getGet('b'))) {
            $brand = $this->request->getGet('b');
            $tenant_name_selected = $brand;
            $where['tenant.tenant_name'] = $brand;
        }
        // PROVINCE
        if (!empty($this->request->getGet('p'))) {
            $province = $this->request->getGet('p');
            $province_selected = $province;
            $where['province.province'] = $province;
        }
        // SORTING
        if (!empty($this->request->getGet('s'))) {
            $sorting = $this->request->getGet('b');
            $sorting_selected = $sorting;
            if ($sorting == 'newest_post') {
                $order_by = 'products.created_at';
                $order_value = 'desc';
            } else if ($sorting == 'oldest_post') {
                $order_by = 'products.created_at';
                $order_value = 'asc';
            } else if ($sorting == 'lowest Price') {
                $order_by = 'products.product_price';
                $order_value = 'asc';
            } else if ($sorting == 'highest_price') {
                $order_by = 'products.product_price';
                $order_value = 'desc';
            } else if ($sorting == 'a_z') {
                $order_by = 'products.product_name';
                $order_value = 'asc';
            } else if ($sorting == 'z_a') {
                $order_by = 'products.product_name';
                $order_value = 'desc';
            }
        }

        if ($cat == 'all') {
            $products = $this->productModel->select('products.product_idx, products.product_name, products.slug, products.image1, products.price, tenant.tenant_name, tenant.logo, province.province')
                                           ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'INNET')
                                           ->join('province', 'tenant.province_idx = province.province_idx', 'INNER')
                                           ->where('products.status', 'ON')
                                           ->orderBy('products.created_at', 'desc')
                                           ->paginate(50, 'item');
        } else {
            $products = $this->productModel->select('products.product_idx, products.product_name, products.slug, products.image1, products.price, tenant.tenant_name, tenant.logo, province.province')
                                           ->join('category', 'category.category_idx = products.category_idx', 'INNER')
                                           ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'INNER')
                                           ->join('province', 'tenant.province_idx = province.province_idx', 'INNER')
                                           ->where('products.status', 'ON')
                                           ->where($where)
                                           ->orderBy($order_by, $order_value)
                                           ->paginate(12, 'item');
        }

        //format product url into tenant-name
        foreach ($products as $key => $row) {
            if ($row['tenant_name']) {
                $tenant_name = strtolower($row['tenant_name']);
                $this->createURLSlug($tenant_name);
                
                $products[$key]['product_url'] = base_url('product/'.$tenant_name.'/'.$row['slug']);
            }
        }

        // GET ALL CATEGORY
        $categories = $this->categoryModel->where('parent_idx >', 0)->orderBy('category_name', 'asc')->findAll();

        // GET ALL BRAND
        $brand = $this->tenantModel->orderBy('tenant_name', 'asc')->findAll();

        // GET ALL PROVINCE
        $province = $this->provinceModel->findAll();

        // ACAK PRODUK
        shuffle($products);
        
        $data = [
            'category'               => $categoriesMenu,
            'products'               => $products,
            'category_selected'      => $category_selected,
            'category_slug_selected' => $category_slug_selected,
            'tenant_name_selected'   => !empty($tenant_name_selected) ? $tenant_name_selected : '',
            'province_selected'      => !empty($province_selected) ? $province_selected : '',
            'sorting_selected'       => !empty($sorting_selected) ? $sorting_selected : '',
            'categories'             => $categories,
            'brand'                  => $brand,
            'province'               => $province,
            'pager'                  => $this->productModel->pager
        ];

        return view('frontend/products', $data);
    }

    public function all_brand()
    {
        $categories = $this->getCategoryTree(0);

        $tenant = $this->tenantModel->select('tenant_idx, tenant_name, logo')
                                    ->where('status', 'ACTIVE')
                                    ->paginate(50, 'item');
        
        foreach ($tenant as $key => $row) {
            if ($row['tenant_name']) {
                $tenant_name = strtolower($row['tenant_name']);
                $tenant_name = $this->createURLSlug($tenant_name);
                $tenant[$key]['brand_url'] = base_url('brand/'.$tenant_name);
            }
        }
        
        // ACAK BRANDS
        shuffle($tenant);

        $data = [
            'category' => $categories,
            'tenant'   => $tenant,
            'pager'    => $this->tenantModel->pager
        ];

        return view('frontend/brands', $data);
    }

    public function all_category()
    {
        $categories = $this->getCategoryTree(0);

        $category = $this->categoryModel->where('parent_idx >', 0)->paginate(50, 'item');
        
        foreach ($category as $key => $row) {
            if ($row['category_name']) {
                $category_name = $this->createURLSlug(strtolower($row['category_name']));
                $category[$key]['products_url'] = base_url('products?c='.$category_name);
            }
        }
        
        $data = [
            'category'    => $categories,
            'categories'  => $category,
            'pager'       => $this->categoryModel->pager
        ];

        return view('frontend/categories', $data);
    }

    public function search_product()
    {
        $categories = $this->getCategoryTree(0);

        $keyword = $this->request->getVar('k');
        $products = $this->productModel->select('products.product_idx, products.product_name, products.slug, products.image1, products.price, tenant.tenant_name, tenant.logo, province.province')
                                       ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'INNER')
                                       ->join('province', 'tenant.province_idx = province.province_idx', 'INNER')
                                       ->where('products.status', 'ON')
                                       ->like('products.product_name', $keyword, 'both')
                                       ->paginate(12, 'item');

        foreach ($products as $key => $row) {
            if ($row['tenant_name']) {
                $tenant_name = strtolower($row['tenant_name']);
                $this->createURLSlug($tenant_name);
                
                $products[$key]['product_url'] = base_url('product/'.$tenant_name.'/'.$row['slug']);
            }
        } 
        
        $data = [
            'category'    => $categories,
            'products'    => $products,
            'pager'       => $this->productModel->pager
        ];

        return view('frontend/search', $data);
    }
}
