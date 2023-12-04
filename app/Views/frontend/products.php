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
                    <select class="select-kategori" name="cboCategory" id="cboCategory">
                    <option value="">All Kategori</option>
                    <?php foreach ($categories as $key => $row): ?>
                        <option value="<?=$row['category_slug'] ?>" <?=$row['category_slug'] == $category_slug_selected ? 'selected' : '' ?>><?=$row['category_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select-brand" name="cboBrand" id="cboBrand">
                    <option value="">All Brand</option>
                    <?php foreach ($brand as $key => $row): ?>
                        <option value="<?=strtolower($row['tenant_name']) ?>" <?=$tenant_name_selected == $row['tenant_name'] ? 'selected' : '' ?>><?=$row['tenant_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select-provinsi" name="cboProvince" id="cboProvince">
                    <option value="">All Propinsi</option>
                    <?php foreach ($province as $key => $row): ?>
                        <option value="<?=strtolower($row['province']) ?>" <?=$province_selected == $row['province'] ? 'selected' : '' ?>><?=$row['province'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select-sort-list" name="cboSorting" id="cboSorting">
                        <option value="newest_post" <?=$sorting_selected == 'newest_post' ? 'selected' : '' ?>>Newest Post</option>
                        <option value="oldest_post" <?=$sorting_selected == 'oldest_post' ? 'selected' : '' ?>>Oldest Post</option>
                        <option value="lowest_price" <?=$sorting_selected == 'lowest_price' ? 'selected' : '' ?>>Lowest Price</option>
                        <option value="highest_price" <?=$sorting_selected == 'highest_price' ? 'selected' : '' ?>>Highest Price</option>
                        <option value="a_z" <?=$sorting_selected == 'a_z' ? 'selected' : '' ?>>A - Z</option>
                        <option value="z_a" <?=$sorting_selected == 'z_a' ? 'selected' : '' ?>>Z - A</option>
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
<script src="<?=base_url('assets/preset/vendor/jquery/jquery.min.js?v=').time(); ?>"></script>
<script>
    $(document).ready(function(){
        let origin = $(location).attr('href');

        $('#cboCategory').on('click, change', function(){
            c = $(this).val();
            // GET ORIGIN
            let url = new URL(origin);
            let search_params = url.searchParams;
            // SET NEW VALUE
            search_params.set('c', c);
            // GO TO CURRENT URL
            location.href = url;
        });

        $('#cboBrand').on('click, change', function(){
            b = $(this).val();
            // GET ORIGIN
            let url = new URL(origin);
            let search_params = url.searchParams;
            // SET NEW VALUE
            search_params.set('b', b);
            // GO TO CURRENT URL
            location.href = url;
        });

        $('#cboProvince').on('click, change', function(){
            p = $(this).val();
            // GET ORIGIN
            let url = new URL(origin);
            let search_params = url.searchParams;
            // SET NEW VALUE
            search_params.set('p', p);
            // GO TO CURRENT URL
            location.href = url;
        });

        $('#cboSorting').on('click, change', function(){
            s = $(this).val();
            // GET ORIGIN
            let url = new URL(origin);
            let search_params = url.searchParams;
            // SET NEW VALUE
            search_params.set('s', s);
            // GO TO CURRENT URL
            location.href = url;
        });
    })
</script>
<?=$this->endSection(); ?>