<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Katalog Sepatu Indonesia">
    <meta name="author" content="Yandi Kusyandi">
    <meta name="generator" content="Katalog Sepatu Indonesia">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" sizes="180x180">
    <link rel="icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" sizes="32x32" type="image/png">
    <link rel="icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" sizes="16x16" type="image/png">
    <title><?=getenv('SITE_TITLE') ?></title>
    <!-- Bootstrap -->
    <link href="<?=base_url('assets/custom/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Select 2 -->
    <link href="<?=base_url('assets/custom/css/select2.min.css') ?>" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/custom/css/fontawesome.css') ?>">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/custom/css/katalog-sepatu-indonesia.css') ?>">
</head>

<body>
    <section class="body-login">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-12 p-0">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center bg-left-login">
                                <div class="text-white box-content-login">
                                    <h3 class="subtitle mb-2 text-white bold">#<span class="text-white">Ayo</span>Dagang</h3>
                                    <h3 class="title pb-4 mb-4 text-white bold">Katalog Elektronik Produk Sepatu Indonesia</h3>
                                    <p class="text-white">
                                        Dalam mewujudkan Visi Indonesia menjadi salah satu pusat Sepatu di Dunia, Direktorat Penggunaan dan Pemasaran Produk Dalam Negeri, Direktorat Jenderal Perdagangan Dalam Negeri, Kementerian Perdagangan mendukung promosi produk sepatu dalam negeri melalui katalog elektronik.
                                    </p>
                                    <p class="text-white">
                                        Kementerian Perdagangan selalu membuka pintu bagi informasi mengenai berbagai kebijakan dan kegiatan perdagangan bagi seluruh masyarakat, dan menganggap penting untuk menyampaikan perkembangan luas sektor perdagangan ke semua lapisan masyarakat dan pemangku kepentingan lainnya karena sektor perdagangan merupakan salah satu sektor penting dalam kegiatan ekonomi.
                                    </p>
                                    <p class="text-white">
                                        Dalam kaitan ini, Kementerian Perdagangan sedang berupaya meningkatkan fasilitas layanan informasi melalui Situs Web Kementerian Perdagangan. Proses peningkatan situs Kementerian Perdagangan terus dilakukan secara bertahap.
                                    </p>
                                    <p class="text-white mb-5">
                                        Tahap pengembangan selanjutnya adalah menyediakan layanan on-line berbasis web. Pengembangan sekarang pada tahap ketiga, tetapi waktu masih diperlukan dalam pengembangannya mengingat ini terkait dengan pengembangan sistem layanan online itu sendiri. Berdasarkan evaluasi kami, pengguna tidak hanya berasal dari dalam negeri, tetapi juga dari luar negeri.
                                    </p>
                                    <p class="mb-0">
                                        <a href="https://www.kemendag.go.id/" class="text-white bold"><u>Kementrian Perdaganan Indonesia</u></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center bg-right-login">
                                <div class="card-body">
                                    <!-- <img src="assets/img/logo-katalog-sepatu-indonesia.png" class="mb-3"> -->
                                    <h3 class="mt-1 mb-1 pb-1 text-green bold">Login</h3>
                                    <p class="mb-4 medium-bold fs-14">Katalog Elektronik Produk Sepatu Indonesia</p>
                                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo session()->getFlashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" method="post" action="<?=base_url('do-login'); ?>">
                                        <?= csrf_field(); ?>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <div class="form-outline mb-2">
                                                    <label class="form-label text-grey" for="">Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-outline mb-2">
                                                    <label class="form-label text-grey" for="">Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <input class="btn btn-primary text-white medium-bold" type="submit" value="Login">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <a class="text-green medium-bold" href=""  data-bs-toggle="modal" data-bs-target="#modal-forgot-password"><u>Forgot Password?</u></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MODAL FORGOT PASSWORD -->
    <div class="modal fade" id="modal-forgot-password" tabindex="-1" aria-labelledby="modal-forgot-password" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="row">
                        <div class="col-12 mb-2">
                            <h5>Atur ulang kata sandi</h5>
                            <p>Masukkan e-mail yang terdaftar. Kami akan mengirimkan kode verifikasi untuk atur ulang kata sandi.</p>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" placeholder="Email Anda ...">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn text-white medium-bold btn-primary w-100 mb-0">Kirim</button>
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