<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Frontend\Main::index');
$routes->get('about-us', 'Frontend\Main::about_us');
$routes->get('contact-us', 'Frontend\Main::contact_us');
$routes->post('submit-contact-us', 'Frontend\Main::submit_contact_us');
$routes->post('search-product', 'Frontend\Main::search_product'); //search product

$routes->get('category/(:any)', 'Frontend\Main::product_by_category/$1'); //product by selected category
$routes->get('(:any)/(:any)', 'Frontend\Main::product_detail/$1/$2'); //product detail
$routes->get('brand/(:any)', 'Frontend\Main::brand_detail/$1'); //brand detail

//ADMIN
$routes->get('admin', 'Admin\Login::index');
$routes->post('admin/do-login', 'Admin\Login::do_login');

$routes->group('admin', ['filter' => 'userAuth'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('banner', 'Admin\Banner::index');
    
    //tenant
    $routes->get('tenant', 'Admin\Tenant::index');
    $routes->get('create-tenant', 'Admin\Tenant::create');
    $routes->post('save-tenant', 'Admin\Tenant::store');
    $routes->get('edit-tenant/(:any)', 'Admin\Tenant::edit/$1');
    $routes->post('update-tenant', 'Admin\Tenant::update');
    $routes->get('delete-tenant/(:any)', 'Admin\Tenant::delete/$1');
    $routes->get('ajax-city/(:num)', 'Admin\Tenant::ajax_city/$1');
    $routes->post('ajax-tenant-list', 'Admin\Tenant::ajax_tenant_list');

    //product

    //category
    $routes->get('category', 'Admin\Category::index');
    $routes->get('create-category', 'Admin\Category::create');
    $routes->post('save-category', 'Admin\Category::store');
    $routes->get('edit-category/(:any)', 'Admin\Category::edit/$1');
    $routes->post('update-category', 'Admin\Category::update');
    $routes->get('delete-category/(:any)', 'Admin\Category::delete/$1');
    $routes->post('ajax-category-list', 'Admin\Category::ajax_category_list');

    //users
    $routes->get('users', 'Admin\Users::index');
    $routes->get('create-user', 'Admin\Users::create');
    $routes->post('save-user', 'Admin\Users::store');
    $routes->get('edit-user/(:any)', 'Admin\Users::edit/$1');
    $routes->post('update-user', 'Admin\Users::update');
    $routes->get('delete-user/(:any)', 'Admin\Users::delete/$1');
    $routes->post('ajax-user-list', 'Admin\Users::ajax_user_list');

    //banner
    $routes->get('banner', 'Admin\Banner::index');
    $routes->get('create-banner', 'Admin\Banner::create');
    $routes->post('save-banner', 'Admin\Banner::store');
    $routes->get('edit-banner/(:any)', 'Admin\Banner::edit/$1');
    $routes->post('update-banner', 'Admin\Banner::update');
    $routes->get('delete-banner/(:any)', 'Admin\Banner::delete/$1');
    $routes->post('ajax-banner-list', 'Admin\Banner::ajax_banner_list');

    $routes->get('logout', 'Admin\Login::logout');
    $routes->get('change-passwd', 'Admin\Login::change_passwd');
    $routes->post('do-change-passwd', 'Admin\Login::do_change_passwd');
});

//TENANT
$routes->get('login', 'Tenant\Login::index');
$routes->post('do-login', 'Tenant\Login::do_login');
$routes->get('forgot-password', 'Tenant\Login::forgot_password'); 

$routes->group('tenant', ['filter' => 'userAuth'], function($routes) {
    $routes->get('dashboard', 'Tenant\Dashboard::index');
    $routes->get('logout', 'Tenant\Login::logout');
    $routes->get('change-passwd', 'Admin\Login::change_passwd');
    $routes->post('do-change-passwd', 'Tenant\Login::do_change_passwd');

    //banner
    $routes->get('banner', 'Admin\Banner::index');
    $routes->get('create-banner', 'Admin\Banner::create');
    $routes->post('save-banner', 'Admin\Banner::store');
    $routes->get('edit-banner/(:any)', 'Admin\Banner::edit/$1');
    $routes->post('update-banner', 'Admin\Banner::update');
    $routes->get('delete-banner/(:any)', 'Admin\Banner::delete/$1');
    $routes->post('ajax-banner-list', 'Admin\Banner::ajax_banner_list');

    //product
    $routes->get('product', 'Tenant\Product::index');
    $routes->get('create-product', 'Tenant\Product::create');
    $routes->post('save-product', 'Tenant\Product::store');
    $routes->get('edit-product/(:any)', 'Tenant\Product::edit/$1');
    $routes->post('update-product', 'Tenant\Product::update');
    $routes->get('delete-product/(:any)', 'Tenant\Product::delete/$1');
    $routes->post('ajax-product-list', 'Tenant\Product::ajax_product_list');
    $routes->get('delete-image/(:num)/(:any)', 'Tenant\Product::delete_image/$1/$2');
});