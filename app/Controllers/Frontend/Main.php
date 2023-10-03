<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Tenant\ProductModel;
use App\Models\Admin\TenantModel;
use App\Models\Admin\BannerModel;

class Main extends BaseController
{
    public function __construct()
    {
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
        
        $product = $this->productModel->select('products.product_idx, products.product_name, products.slug, products.image1, products.price, tenant.tenant_name, province.province')
                                      ->join('tenant', 'tenant.tenant_idx = products.tenant_idx', 'LEFT')
                                      ->join('province', 'tenant.province_idx = province.province_idx', 'LEFT')
                                      ->where('products.status', 'ON')
                                      ->findAll();

        $data = [
            'category'  => shuffle($categories),
            'banner'    => shuffle($banner),
            'tenant'    => shuffle($tenant),
            'product'   => shuffle($product),
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
}
