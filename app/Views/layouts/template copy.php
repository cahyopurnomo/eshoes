<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Katalog Sepatu Indonesia">
    <meta name="author" content="Yandi Kusyandi">
    <meta name="generator" content="Katalog Sepatu Indonesia">
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?=base_url('assets/img/favicon.png') ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?=base_url('assets/img/favicon.png') ?>" sizes="180x180">
    <link rel="icon" href="<?=base_url('assets/img/favicon.png') ?>" sizes="32x32" type="image/png">
    <link rel="icon" href="<?=base_url('assets/img/favicon.png') ?>" sizes="16x16" type="image/png">
    <title><?=getenv('SITE_TITLE') ?></title>
    <!-- Bootstrap -->
    <!-- <link href="<?=base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"> -->
    <!-- Select 2 -->
    <!-- <link href="<?=base_url('assets/css/select2.min.css') ?>" rel="stylesheet" /> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="<?=base_url('assets/css/fontawesome.css') ?>"> -->
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/css/katalog-sepatu-indonesia.css') ?>">
    <link href="<?=base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?=base_url('vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <!-- Page level plugins -->
    <script src="<?=base_url('vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?=base_url('vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <?= $this->renderSection('styles') ?>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?=session()->get('loggedAs') == 'admin' ? $this->include('layouts/admin_sidebar') : $this->include('layouts/tenant_sidebar') ?>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <?= $this->include('layouts/topbar') ?>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <?=session()->get('loggedAs') == 'admin' ? $this->renderSection('content') : $this->renderSection('content') ?>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Asosiasi Pengusaha Sepatu Indonesia <?= Date('Y') ?> </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= session()->get('loggedAs') == 'admin' ? base_url('/admin/logout') : base_url('/tenant/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?=base_url('vendor/jquery/jquery.min.js') ?>"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?=base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?=base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?=base_url('assets/js/sb-admin-2.min.js') ?>"></script>
        <!-- Select 2 -->
        <!-- <script src="<?=base_url('assets/js/select2.min.js') ?>"></script> -->
        <!-- Produk Detail Thumbnail Zoom -->
        <!-- <script src="<?=base_url('assets/js/jquery.zoom.min.js') ?>"></script> -->
        <!-- Custom Script -->
        <!-- <script src="<?=base_url('assets/js/custom.js') ?>"></script> -->
        <?= $this->renderSection('scripts') ?>
    </body>
</html>