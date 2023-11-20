<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page mb-3 text-left">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card card-brand">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="<?=base_url('assets/uploads/logo/'.$tenant['logo']) ?>" class="img-toko img-top-card-brand">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-left-top-content p-0">
                                            <p class="text-brand-toko bold mb-0"><?=$tenant['tenant_name'] ?></p>
                                            <p class="text-pin-marker text-grey mb-3"><img src="<?=base_url('assets/img/pin-marker.png') ?>" class="img-pin-marker">&nbsp; <?=$tenant['province'] ?></p>
                                            <a href="https://wa.me/<?=$tenant['phone'] ?>" class="btn btn-primary text-white medium-bold"><i class="fa fa-whatsapp"></i> &nbsp; Whatsapp</a>
                                            <a href="mailto:<?=$tenant['email'] ?>" class="btn btn-email text-green medium-bold"><i class="fa fa-envelope"></i> &nbsp; Email</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-end p-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="medium-bold">Akun Sosial Media</p>
                                            <p class="col-link-sosial-media">
                                                <?php if (!empty($tenant['facebook'])): ?>
                                                <a href="<?='https://www.facebook.com/'.$tenant['facebook'] ?>"><img src="<?=base_url('assets/img/facebook.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['instagram'])): ?>
                                                <a href="<?='https://www.instagram.com/'.$tenant['instagram'] ?>"><img src="<?=base_url('assets/img/instagram.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['linkedin'])): ?>
                                                <a href="<?='https://www.linkedin.com/company/'.$tenant['linkedin'] ?>"><img src="<?=base_url('assets/img/linkedin.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['tiktok'])): ?>
                                                <a href="<?='https://www.tiktok.com/@'.$tenant['tiktok'] ?>"><img src="<?=base_url('assets/img/tik-tok.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['youtube'])): ?>
                                                <a href="<?='https://www.youtube.com/@'.$tenant['youtube'] ?>"><img src="<?=base_url('assets/img/youtube.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['twitter'])): ?>
                                                <a href="<?='https://www.twitter.com/'.$tenant['twitter'] ?>"><img src="<?=base_url('assets/img/twitter.jpg') ?>"></a>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-md-right">
                                            <p class="medium-bold">Akun Marketplace</p>
                                            <p class="col-link-sosial-media">
                                                <?php if (!empty($tenant['lazada'])): ?>
                                                <a href="<?='https://www.lazada.co.id/shop/'.$tenant['lazada'] ?>"><img src="<?=base_url('assets/img/lazada.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['tokopedia'])): ?>
                                                <a href="<?='https://www.tokopedia.com/'.$tenant['tokopedia'] ?>"><img src="<?=base_url('assets/img/tokopedia.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['shopee'])): ?>
                                                <a href="<?='https://shopee.co.id/'.$tenant['shopee'] ?>"><img src="<?=base_url('assets/img/shopee.jpg') ?>"></a>
                                                <?php endif; ?>
                                                <?php if (!empty($tenant['blibli'])): ?>
                                                <a href="<?='https://www.blibli.com/brand/'.$tenant['blibli'] ?>"><img src="<?=base_url('assets/img/blibli.png') ?>"></a>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-bottom-card">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills" id="" role="tablist">
                        <li class="nav-item" role="">
                            <button class="nav-link medium-bold active" id="beranda-tab" data-bs-toggle="tab" data-bs-target="#beranda-tab-pane" type="button" role="tab" aria-controls="beranda-tab-pane" aria-selected="true">Beranda</button>
                        </li>
                        <li class="nav-item" role="">
                            <button class="nav-link medium-bold" id="produk-tab" data-bs-toggle="tab" data-bs-target="#produk-tab-pane" type="button" role="tab" aria-controls="produk-tab-pane" aria-selected="true">Produk</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="beranda-tab-pane" role="tabpanel" aria-labelledby="beranda-tab" tabindex="0">
                            <div class="content-tabs-beranda">
                                <!-- SLIDE 1-->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div id="carouselBeranda_01" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <?php foreach ($banner1 as $key => $row): ?>
                                                    <button type="button" data-bs-target="#carouselBeranda_01" data-bs-slide-to="<?=$key ?>" <?=$key == 0 ? 'class="active"' : '' ?> aria-current="true" aria-label="Slide <?=$key+1 ?>"></button>
                                                <?php endforeach ;?>
                                            </div>
                                            <div class="carousel-inner">
                                                <?php foreach ($banner1 as $key => $row): ?>
                                                    <div class="carousel-item <?=$key == 0 ? 'active' : '' ?>">
                                                        <img src="<?=base_url('assets/uploads/banner/'.$row['banner_image']) ?>" class="d-block w-100" alt="<?=$row['banner_name'] ?>">
                                                    </div>    
                                                <?php endforeach ;?>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBeranda_01" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselBeranda_01" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- SLIDE 2,3-->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div id="carouselBeranda_02" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <?php foreach ($banner2 as $key => $row): ?>
                                                    <button type="button" data-bs-target="#carouselBeranda_02" data-bs-slide-to="<?=$key ?>" <?=$key == 0 ? 'class="active"' : '' ?> aria-current="true" aria-label="Slide <?=$key+1 ?>"></button>
                                                <?php endforeach ;?>
                                            </div>
                                            <div class="carousel-inner">
                                                <?php foreach ($banner2 as $key => $row): ?>
                                                    <div class="carousel-item <?=$key == 0 ? 'active' : '' ?>">
                                                        <img src="<?=base_url('assets/uploads/banner/'.$row['banner_image']) ?>" class="d-block w-100" alt="<?=$row['banner_name'] ?>">
                                                    </div>
                                                <?php endforeach ;?>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBeranda_02" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselBeranda_02" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="carouselBeranda_03" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <?php foreach ($banner3 as $key => $row): ?>
                                                    <button type="button" data-bs-target="#carouselBeranda_03" data-bs-slide-to="<?=$key ?>" <?=$key == 0 ? 'class="active"' : '' ?> aria-current="true" aria-label="Slide <?=$key+1 ?>"></button>
                                                <?php endforeach ;?>
                                            </div>
                                            <div class="carousel-inner">
                                                <?php foreach ($banner3 as $key => $row): ?>
                                                    <div class="carousel-item <?=$key == 0 ? 'active' : '' ?>">
                                                        <img src="<?=base_url('assets/uploads/banner/'.$row['banner_image']) ?>" class="d-block w-100" alt="<?=$row['banner_name'] ?>">
                                                    </div>
                                                <?php endforeach ;?>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBeranda_03" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselBeranda_03" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- SLIDE 4,5,6-->
                                <div class="row mb-5">
                                    <?php if (!empty($banner4['banner_image'])): ?>
                                    <div class="col-md-4">
                                        <img src="<?=base_url('assets/uploads/banner/'.$banner4['banner_image']) ?>" class="d-block w-100 img-banner-456" alt="<?=$banner4['banner_name'] ?>">
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($banner5['banner_image'])): ?>
                                    <div class="col-md-4">
                                        <img src="<?=base_url('assets/uploads/banner/'.$banner5['banner_image']) ?>" class="d-block w-100 img-banner-456" alt="<?=$banner5['banner_name'] ?>">
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($banner6['banner_image'])): ?>
                                    <div class="col-md-4">
                                        <img src="<?=base_url('assets/uploads/banner/'.$banner6['banner_image']) ?>" class="d-block w-100" alt="<?=$banner6['banner_name'] ?>">
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="produk-tab-pane" role="tabpanel" aria-labelledby="produk-tab" tabindex="0">
                            <div class="content-tabs-produk">
                                <?php if (!empty($product)): ?>
                                <div class="col-box-form-kategori mb-4">
                                    <div class="row">
                                        <div class="col-md-3 offset-md-9">
                                            <form class="select-list-form-control" action="<?=$_SERVER['PHP_SELF'] ?>" method="GET">
                                                <select class="form-group" name="sort" onchange="this.form.submit()">
                                                    <option value="newest">Terbaru</option>
                                                    <option value="oldest">Terlama</option>
                                                    <option value="lower_price">Termurah</option>
                                                    <option value="higher_price">Termahal</option>
                                                    <option value="az">A - Z</option>
                                                    <option value="za">Z - A</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="row">
                                    <?php foreach ($product as $key => $row): ?>
                                        <div class="col-3 mb-4">
                                            <div class="card text-left">
                                                <a href="<?=base_url('product/'.strtolower($row['tenant_name']).'/'.$row['slug']) ?>">
                                                    <img src="<?=base_url('assets/uploads/products/'.$row['image1']) ?>" class="card-img-top" alt="<?=$row['product_name'] ?>">
                                                    <div class="card-body">
                                                        <p class="medium-bold mb-1"><?=$row['product_name'] ?></p>
                                                        <p class="text-green bold mb-3">Rp. <?=number_format($row['price']) ?></p>
                                                        <p class="mb-1 text-grey"><img src="<?=base_url('assets/uploads/logo/'.$row['logo']) ?>" class="img-toko">&nbsp; <?=$row['tenant_name'] ?></p>
                                                        <p class="text-grey"><img src="<?=base_url('assets/img/pin-marker.png') ?>" class="img-pin-marker">&nbsp; <?=$row['province'] ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>                
                                    <?php endforeach ;?>
                                </div>
                                
                                <div class="row mb-3 mt-2">
                                    <div class="col-md-12">
                                        <nav aria-label="Page navigation">
                                        <?php if ($pager):?>
                                            <?=$pager->links('item','pagination') ?>
                                        <?php endif ?>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?=$this->endSection(); ?>