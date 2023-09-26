<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=getenv('SITE_TITLE') ?></title>
    <link rel="shortcut icon" href="<?=base_url('assets/custom/img/favicon.png') ?>" type="image/png">
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/preset/vendor/fontawesome-free/css/all.min.css?v=').time(); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/preset/css/sb-admin-2.min.css?v=').time(); ?>" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?=base_url('assets/preset/vendor/datatables/dataTables.bootstrap4.min.css?v=').time(); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- <?= $this->renderSection('styles') ?> -->
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/preset/css/style-admin.css') ?>">

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/preset/vendor/jquery/jquery.min.js?v=').time(); ?>"></script>
    <script src="<?=base_url('assets/preset/vendor/bootstrap/js/bootstrap.bundle.min.js?v=').time(); ?>"></script>
    <script src="<?= base_url('assets/custom/vendor/bootstrap/js/bootstrap-confirm.js?v=').time(); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/preset/vendor/jquery-easing/jquery.easing.min.js?v=').time(); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url('assets/preset/vendor/datatables/jquery.dataTables.min.js?v=').time(); ?>"></script>
    <script src="<?=base_url('assets/preset/vendor/datatables/dataTables.bootstrap4.min.js?v=').time(); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js?v=<?=time() ?>"></script>
    <!-- <?= $this->renderSection('scripts') ?> -->
    <style>
        .required label:after {
            color: #ff5159;
            content: " *";
        }
    </style>
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
                <?=$this->renderSection('content') ?>
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
    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/preset/js/sb-admin-2.min.js?v=').time(); ?>"></script>
</body>

</html>