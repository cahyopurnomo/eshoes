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
                <div class="carousel-item active">
                    <img src="<?=base_url('assets/custom/img/slide-01.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?=base_url('assets/custom/img/slide-03.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?=base_url('assets/custom/img/slide-02.jpg') ?>" class="d-block w-100" alt="...">
                </div>
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
                        <h6 class="bold mb-0"><a href="kategori.html" class="text-green">Lihat Semua Kategori &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <div class="card text-center">
                        <a href="kategori.html">
                            <img src="assets/custom/img/sepatu-sport-graphity.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="medium-bold mb-0">Sepatu Sport</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card text-center">
                        <a href="kategori.html">
                            <img src="<?=base_url() ?>assets/custom/img/sepatu-sekolah-graphity.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="medium-bold mb-0">Sepatu Sneaker</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card text-center">
                        <a href="kategori.html">
                            <img src="<?=base_url() ?>assets/custom/img/goodyear-welted-shoes.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="medium-bold mb-0">Sepatu Fashion</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card text-center">
                        <a href="kategori.html">
                            <img src="<?=base_url() ?>assets/custom/img/sepatu-jogging-phylon.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="medium-bold mb-0">Sepatu Jogging</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card text-center">
                        <a href="kategori.html">
                            <img src="<?=base_url() ?>assets/custom/img/sepatu-olahraga-phylon.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="medium-bold mb-0">Sepatu Olahraga</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card text-center">
                        <a href="kategori.html">
                            <img src="<?=base_url() ?>assets/custom/img/sepatu-boots-graphity.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="medium-bold mb-0">Sepatu Boots</h6>
                            </div>
                        </a>
                    </div>
                </div>
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
                    <h6 class="bold mb-0"><a href="brand.html" class="text-green">Lihat Semua Brand &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 mb-3">
                <div class="card">
                    <a href="brand.html"><img src="<?=base_url() ?>assets/custom/img/ventela.jpg" class="card-img-top" alt="..."></a>
                </div>
            </div>
            <div class="col-2 mb-3">
                <div class="card">
                    <a href="brand.html"><img src="<?=base_url() ?>assets/custom/img/aero-street.jpg" class="card-img-top" alt="..."></a>
                </div>
            </div>
            <div class="col-2 mb-3">
                <div class="card">
                    <a href="brand.html"><img src="<?=base_url() ?>assets/custom/img/patrobas.jpg" class="card-img-top" alt="..."></a>
                </div>
            </div>
            <div class="col-2 mb-3">
                <div class="card">
                    <a href="brand.html"><img src="<?=base_url() ?>assets/custom/img/brodo.jpg" class="card-img-top" alt="..."></a>
                </div>
            </div>
            <div class="col-2 mb-3">
                <div class="card">
                    <a href="brand.html"><img src="<?=base_url() ?>assets/custom/img/nah-project.jpg" class="card-img-top" alt="..."></a>
                </div>
            </div>
            <div class="col-2 mb-3">
                <div class="card">
                    <a href="brand.html"><img src="<?=base_url() ?>assets/custom/img/buccheri.jpg" class="card-img-top" alt="..."></a>
                </div>
            </div>
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
                    <h6 class="bold mb-0"><a href="produk-unggulan.html" class="text-green">Lihat Semua Produk &nbsp;<i class="fa fa-angle-double-right"></i></a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="<?=base_url() ?>assets/custom/img/sepatu-sport-graphity.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="<?=base_url() ?>assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="<?=base_url() ?>assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="<?=base_url() ?>assets/custom/img/sepatu-sekolah-graphity.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="<?=base_url() ?>assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="<?=base_url() ?>assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="<?=base_url() ?>assets/custom/img/goodyear-welted-shoes.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/sepatu-jogging-phylon.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/sepatu-olahraga-phylon.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/sepatu-boots-graphity.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-01.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-02.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-03.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-04.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-05.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-06.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-07.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-08.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-09.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="card text-left">
                    <a href="produk-detail.html">
                        <img src="assets/custom/img/img-produk-10.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="medium-bold mb-1">Servodio 36-44 Navy Sepatu Sneakers Casual - SV02</p>
                            <p class="text-green bold mb-3">Rp. 1.500.000</p>
                            <p class="mb-1 text-grey"><img src="assets/custom/img/toko-01.jpg" class="img-toko">&nbsp; Aero Street Shoes Indonesia</p>
                            <p class="mb-0 text-grey"><img src="assets/custom/img/pin-marker.png" class="img-pin-marker">&nbsp; Jawa Tengah</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-2 offset-md-5">
                <a href="#" id="loadMore" class="btn-load-more">Tampilkan lebih banyak &nbsp;<i class="fa fa-angle-double-right"></i></a>
            </div>
        </div> -->
        <div class="row mb-3 mt-2">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link medium-bold">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link medium-bold active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link medium-bold" href="#">2</a></li>
                        <li class="page-item"><a class="page-link medium-bold" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link medium-bold" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>
<?=$this->endSection(); ?>