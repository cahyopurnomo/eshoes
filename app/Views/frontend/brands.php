<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page col-page-brands mb-3">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="col-title-content ps-3 mb-3">
                    <h6 class="bold mb-0">Brand</h6>
                </div>
            </div>
            <div class="col-6">
                <div class="text-end mb-3">
                    <h6 class="bold mb-0"><a href="<?=base_url() ?>" class="text-green">Kembali &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                </div>
            </div>
        </div>
        
        <div class="row">
            <?php foreach ($tenant as $key => $row): ?>
                <div class="col-2 mb-3">
                    <div class="card">
                        <a href="<?=$row['brand_url'] ?>"><img src="<?=!empty($row['logo']) ? base_url('assets/uploads/logo/'.$row['logo']) : base_url('assets/uploads/banner/no-image.jpg') ?>" class="card-img-top" alt="..."></a>
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