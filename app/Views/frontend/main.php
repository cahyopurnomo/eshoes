<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Katalog Sepatu Indonesia">
    <meta name="author" content="Yandi Kusyandi">
    <meta name="generator" content="Katalog Sepatu Indonesia">
    <title><?=getenv('SITE_TITLE') ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" sizes="180x180">
    <link rel="icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" sizes="32x32" type="image/png">
    <link rel="icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" sizes="16x16" type="image/png">
    <title>Katalog Sepatu Indonesia</title>
    <!-- Bootstrap -->
    <link href="<?=base_url('assets/custom/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Select 2 -->
    <link href="<?=base_url('assets/custom/css/select2.min.css') ?>" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/custom/css/fontawesome.css') ?>">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/custom/css/katalog-sepatu-indonesia.css') ?>">
</head>

<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg fixed-top w3_megamenu">
            <div class="container-xxl">
                <a class="navbar-brand me-4" href="index.html">
                    <img src="<?=base_url('assets/custom/img/logo-katalog-sepatu-indonesia.png') ?>">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 medium-bold">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html"><i class="fa fa-home"></i>&nbsp; Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="brand.html"><i class="fa fa-tags"></i>&nbsp; Brand</a>
                        </li>
                        <li class="nav-item dropdown has-megamenu">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fa fa-list"></i>&nbsp; Kategori</a>
                            <div class="dropdown-menu megamenu" role="menu">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="bold text-green mb-2"><i class="fa fa-file-text-o"></i>&nbsp; Sepatu Pria</h6>
                                        <ul>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sport</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sneaker</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Booth</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Casual</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDH</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDL</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="bold text-green mb-2"><i class="fa fa-file-text-o"></i>&nbsp; Sepatu Wanita</h6>
                                        <ul>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sport</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sneaker</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Booth</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Casual</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDH</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDL</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="bold text-green mb-2"><i class="fa fa-file-text-o"></i>&nbsp; Sepatu Anak Laki-laki</h6>
                                        <ul>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sport</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sneaker</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Booth</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Casual</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDH</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDL</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h6 class="bold text-green mb-2"><i class="fa fa-file-text-o"></i>&nbsp; Sepatu Anak Perempuan</h6>
                                        <ul>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sport</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Sneaker</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Booth</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu Casual</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDH</a></li>
                                            <li><a href="kategori.html">-&nbsp; Sepatu PDL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk-unggulan.html"><i class="fa fa-star"></i>&nbsp; Produk Unggulan</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-md-0 medium-bold">
                        <li class="nav-item">
                            <a class="nav-link" href="tentang-kami.html"><i class="fa fa-globe"></i>&nbsp; Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kontak-kami.html"><i class="fa fa-phone"></i>&nbsp; Kontak Kami</a>
                        </li>
                    </ul>
                    <form class="d-flex form-search" role="search">
                        <a href="<?=base_url('login') ?>" class="medium-bold text-green btn-login">
                            <i class="fa fa-user"></i>&nbsp; Login
                        </a>
                        <button type="button" class="btn medium-bold text-white btn-primary medium-bold btn-nav-search" data-bs-toggle="modal" data-bs-target="#modal-search">
                            <i class="fa fa-search"></i>&nbsp; Cari
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
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
    <main class="col-top-footer pt-5 pb-5 mt-1 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>
                        <img src="assets/custom/img/kementrianPerdagangan.webp" class="img-kementrian mb-4">
                        <img src="assets/custom/img/Bangga-Buatan-Indonesia.webp" class="img-bangga-indonesia mb-4">
                        <img src="assets/custom/img/aprisindo.png" class="img-aprisindo mb-4">
                    </p>
                    <h3 class="subtitle mb-2 bold">#<span>Ayo</span>Dagang</h3>
                    <h3 class="title pb-4 mb-4 bold">Katalog Elektronik Produk Sepatu Indonesia</h3>
                    <p class="mb-0">
                        Dalam mewujudkan Visi Indonesia menjadi salah satu pusat Sepatu di Dunia, Direktorat Penggunaan dan Pemasaran Produk Dalam Negeri, Direktorat Jenderal Perdagangan Dalam Negeri, Kementerian Perdagangan mendukung promosi produk sepatu dalam negeri melalui katalog elektronik.
                    </p>
                    <p class="mt-3 mb-0">
                        <a href="tentang-kami.html" class="text-green medium-bold">Pelajari lebih lanjut &nbsp;<i class="fa fa-angle-double-right"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer text-center mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-white mb-0">
                        © 2023. Kementerian Perdagangan Republik Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- MODAL FORM SEARCH -->
    <div class="modal fade" id="modal-search" tabindex="-1" aria-labelledby="modal-search" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="row">
                        <div class="col-9">
                            <input type="search" class="form-control" placeholder="Cari Sepatu ...">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn text-white medium-bold btn-primary w-100 mb-0">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url('assets/custom/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?=base_url('assets/custom/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Select 2 -->
    <script src="<?=base_url('assets/custom/js/select2.min.js') ?>"></script>
    <!-- Produk Detail Thumbnail Zoom -->
    <script src="<?=base_url('assets/custom/js/jquery.zoom.min.js') ?>"></script>
    <!-- Custom Script -->
    <script src="<?=base_url('assets/custom/js/custom.js') ?>"></script>
</body>

</html>