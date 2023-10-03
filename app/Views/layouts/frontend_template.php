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
    <style>
        .required label:after {
            color: #ff5159;
            content: " *";
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <?= $this->include('layouts/frontend_header') ?>
    </header>
    
    <?=$this->renderSection('main') ?>
    
    <footer>
        <?=$this->include('layouts/frontend_footer') ?>
    </footer>
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