<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page mb-3">
    <?php if (session()->getFlashdata('error')) : ?>
    <div class="container">
        <div class="alert mb-23 alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <b>Upppsss! </b>
                <?=session()->getFlashdata('error')?>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-breadcrumb mb-3">
                    <p class="text-grey mb-1">
                        <a href="<?=base_url() ?>" class="text-green medium-bold">Home</a> &nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;
                        <a href="<?=base_url('brand/'.$product['tenant_name']) ?>" class="text-green medium-bold"><?=$product['tenant_name'] ?></a> &nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;
                        <a href="<?=base_url('category/'.$product['category_name']) ?>" class="text-green medium-bold"><?=$product['category_name'] ?></a> &nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;
                        <?=$product['tenant_name'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row row-col-product-detail">
            <div class="col-5">
                <section class="product-page">
                    <div class="thumbnails">
                        <?php if ($product['image1']): ?>
                            <div class="thumb active">
                                <a href="<?=base_url('assets/uploads/products/'.$product['image1']) ?>">
                                    <img src="<?=base_url('assets/uploads/products/'.$product['image1']) ?>" alt="<?=$product['image1'] ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($product['image2']): ?>
                            <div class="thumb">
                                <a href="<?=base_url('assets/uploads/products/'.$product['image2']) ?>">
                                    <img src="<?=base_url('assets/uploads/products/'.$product['image2']) ?>" alt="<?=$product['image2'] ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($product['image3']): ?>
                            <div class="thumb">
                                <a href="<?=base_url('assets/uploads/products/'.$product['image3']) ?>">
                                    <img src="<?=base_url('assets/uploads/products/'.$product['image3']) ?>" alt="<?=$product['image3'] ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="img-display">
                        <span class="zoom">
                            <img src="<?=base_url('assets/uploads/products/'.$product['image1']) ?>" alt="<?=$product['image1'] ?>">
                        </span>
                    </div>
                </section>
            </div>
            <div class="col-7">
                <p class="mb-0"><?=$product['tenant_name'] ?></p>
                <h5 class="bold mb-1"><?=$product['product_name'] ?></h5>
                <p class="text-green bold mb-2 price">Rp. <?=number_format($product['price']) ?></p>
                <ul class="nav nav-pills" id="" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link medium-bold active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="true">Deskripsi</button>
                    </li>
                </ul>
                <div class="tab-content mt-3 mb-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                        <div class="content-tabs-detail">
                            <p><?=$product['description'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <a href="<?=$brand_url ?>">
                            <img src="<?=base_url('assets/uploads/logo/'.$product['logo']) ?>" class="img-toko">
                        </a>
                    </div>
                    <div class="col-11">
                        <p class="text-brand-toko mb-0"><a href="<?=$brand_url ?>" class="medium-bold"><?=$product['tenant_name'] ?></a></p>
                        <p class="text-grey"><img src="<?=base_url('assets/img/pin-marker.png') ?>" class="img-pin-marker">&nbsp; <?=$product['province'] ?></p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="https://wa.me/<?=$product['phone'] ?>" class="btn btn-primary text-white medium-bold"><i class="fa fa-whatsapp"></i> &nbsp; Whatsapp</a>
                    <a href="mailto:<?=$product['email'] ?>" class="btn btn-email text-green medium-bold"><i class="fa fa-envelope"></i> &nbsp; Email</a>
                </div>
            </div>
        </div>
    </div>
</main>
<main class="mt-5 mb-4">
    <div class="container">
        <div class="col-bottom-content-produk-detail pt-3">
            <div class="row">
                <div class="col-6">
                    <div class="col-title-content ps-3 mb-3">
                        <h6 class="bold mb-0">Produk Terkait</h6>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end mb-3">
                        <h6 class="bold mb-0"><a href="<?=base_url('products?cat=all') ?>" class="text-green">Lihat Semua Produk &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                    </div>
                </div>
            </div>
            <div class="row row-col-product-terkait">
                <?php foreach ($related_product as $key => $row): ?>
                    <div class="col-3 mb-4">
                        <div class="card text-left">
                            <a href="<?=base_url(strtolower($row['tenant_name']).'/'.$row['slug']) ?>">
                                <img src="<?=base_url('assets/uploads/products/').$row['image1'] ?>" class="card-img-top" alt="<?=$row['slug'] ?>">
                                <div class="card-body">
                                    <p class="medium-bold mb-1"><?=$row['product_name'] ?></p>
                                    <p class="text-green bold mb-3">Rp. <?=number_format($row['price']) ?></p>
                                    <p class="mb-1 text-grey"><img src="<?=base_url('assets/uploads/logo/'.$row['logo']) ?>assets/img/toko-01.jpg" class="img-toko">&nbsp; <?=$row['tenant_name'] ?></p>
                                    <p class="mb-0 text-grey"><img src="<?=base_url('assets/img/pin-marker.png') ?>" class="img-pin-marker">&nbsp; <?=$row['province'] ?></p>
                                </div>
                            </a>
                        </div>
                    </div>    
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</main>
<?=$this->endSection(); ?>