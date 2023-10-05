<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page mb-3">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="col-title-content ps-3 mb-3">
                    <h6 class="bold mb-0">Produk Unggulan</h6>
                </div>
            </div>
            <div class="col-6">
                <div class="text-end mb-3">
                    <h6 class="bold mb-0"><a href="<?=base_url() ?>" class="text-green">Kembali &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                </div>
            </div>
        </div>
        <?php if (empty($products)): ?>
        <div class="row">
            <div class="alert mb-23 alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <b>Upppsss! </b>
                    Produk Tidak Ditemukan
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <?php foreach ($products as $key => $row): ?>
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