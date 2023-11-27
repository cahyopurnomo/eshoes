<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page mb-3">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <h6 class="bold mb-0"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;<a href="<?=base_url() ?>" class="text-green">Kembali</a></h6>
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
        <div class="col-title">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-category text-center mb-4"><?=$category_selected ?></h1>
                </div>
            </div>
        </div>
        <div class="col-box-form-kategori mb-4">
            <div class="row">
                <div class="col-md-3">
                    <select class="select-kategori" name="">
                        <option value="select_kategori" disabled selected>Select Kategori</option>
                        <option value="sepatu_sport">Sepatu Sport</option>
                        <option value="sepatu_sneaker">Sepatu Sneaker</option>
                        <option value="sepatu_fashion">Sepatu Fashion</option>
                        <option value="sepatu_joging">Sepatu Joging</option>
                        <option value="sepatu_olahraga">Sepatu Olahraga</option>
                        <option value="sepatu_boots">Sepatu Boots</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select-brand" name="">
                        <option value="select_brand" disabled selected>Select Brand</option>
                        <option value="ventela">Ventela</option>
                        <option value="aero_street">Aero Street</option>
                        <option value="patrobas">Patrobas</option>
                        <option value="brodo">Brodo</option>
                        <option value="nah_project">Nah Project</option>
                        <option value="buccheri">Buccheri</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select-provinsi" name="">
                        <option value="select_provinsi" disabled selected>Select Provinsi</option>
                        <option value="aceh">Aceh</option>
                        <option value="bali">Bali</option>
                        <option value="banten">Banten</option>
                        <option value="bengkulu">Bengkulu</option>
                        <option value="yogyakarta">DI Yogyakarta</option>
                        <option value="jakarta">DKI Jakarta</option>
                        <option value="gorontalo">Gorontalo</option>
                        <option value="jambi">Jambi</option>
                        <option value="jawa_barat">Jawa Barat</option>
                        <option value="jawa_timur">Jawa Timur</option>
                        <option value="jawa_tengah">Jawa Tengah</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select-sort-list" name="">
                        <option value="newest_post">Newest Post</option>
                        <option value="oldest_post">Oldest Post</option>
                        <option value="lowest_price">Lowest Price</option>
                        <option value="highest_price">Highest Price</option>
                        <option value="a_z">A - Z</option>
                        <option value="z_a">Z - A</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row col-card-product-unggulan">
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