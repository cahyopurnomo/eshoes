<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page">
    <div class="container">
        <div id="carouselHomePage" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php foreach ($banner as $key => $row): ?>
                    <div class="carousel-item <?=$key == 0 ? 'active' : '' ?>">
                        <img src="<?=base_url('assets/uploads/banner/'.$row['banner_image']) ?>" class="d-block w-100" alt="...">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomePage" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHomePage" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</main>
<main class="mb-0 mt-3">
    <div class="container">
        <div class="box-shadow-container mt-1">
            <div class="row">
                <div class="col-6">
                    <div class="col-title-content ps-3 mb-3">
                        <h6 class="bold mb-0">Kategori Unggulan</h6>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end mb-3">
                        <h6 class="bold mb-0"><a href="<?=base_url('categories?cat=all') ?>" class="text-green">Lihat Semua Kategori &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                    </div>
                </div>
            </div>
            <div class="row row-kategori-unggulan">
                <?php foreach ($categories as $key => $row): ?>
                    <?php if (!empty($row['category_name'])): ?>
                        <div class="col-2 mb-3">
                            <div class="card text-center">
                                <a href="<?=$row['category_url'] ?>">
                                    <img src="<?=!empty($row['category_image']) ? base_url('assets/uploads/logo/'.$row['category_image']) : base_url('assets/uploads/banner/no-image.jpg') ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="medium-bold mb-0"><?=$row['category_name'] ?></h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<main class="mb-0">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="col-title-content ps-3 mb-3">
                    <h6 class="bold mb-0">Brand Unggulan</h6>
                </div>
            </div>
            <div class="col-6">
                <div class="text-end mb-3">
                    <h6 class="bold mb-0"><a href="<?=base_url('brands') ?>" class="text-green">Lihat Semua Brand &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                </div>
            </div>
        </div>
        <div class="row row-brand-unggulan">
            <?php foreach ($tenant as $key => $row): ?>
                <div class="col-2 mb-3">
                    <div class="card">
                        <a href="<?=$row['brand_url'] ?>"><img src="<?=!empty($row['logo']) ? base_url('assets/uploads/logo/'.$row['logo']) : base_url('assets/uploads/banner/no-image.jpg') ?>" class="card-img-top" alt="..."></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<main class="mb-4">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="col-title-content ps-3 mb-3">
                    <h6 class="bold mb-0">Produk Unggulan</h6>
                </div>
            </div>
            <div class="col-6">
                <div class="text-end mb-3">
                    <h6 class="bold mb-0"><a href="<?=base_url('products?cat=all') ?>" class="text-green">Lihat Semua Produk &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                </div>
            </div>
        </div>
        <div class="row row-produk-unggulan">
            <?php foreach ($product as $key => $row): ?>
                <div class="col-3 mb-4">
                    <div class="card text-left">
                        <a href="<?=$row['product_url'] ?>">
                            <img src="<?=!empty($row['image1']) ? base_url('assets/uploads/products/'.$row['image1']) : base_url('assets/uploads/banner/no-image.jpg') ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="medium-bold mb-1"><?=$row['product_name'] ?></p>
                                <p class="text-green bold mb-3">Rp. <?=number_format($row['price']) ?></p>
                                <p class="mb-1 text-grey"><img src="<?=base_url('assets/uploads/logo/'.$row['logo']) ?>" class="img-toko">&nbsp; <?=$row['tenant_name'] ?></p>
                                <p class="mb-0 text-grey"><img src="<?=base_url() ?>assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; <?=$row['province'] ?></p>
                            </div>
                        </a>
                    </div>
                </div>    
            <?php endforeach; ?>
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
</main>
<?=$this->endSection(); ?>