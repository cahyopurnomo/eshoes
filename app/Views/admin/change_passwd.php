<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Update Password</h1>
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <b>Sukses! </b>
            <?=session()->getFlashdata('success')?>
        </div>
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <b>Gagal! </b>
            <?=session()->getFlashdata('error')?>
        </div>
    </div>
    <?php endif; ?>
    <div class="card mb-4">
        <div class="card-body">
            <?php $error = validation_errors(); ?>
            <form id="form_change_passwd" action="<?=$url_save ?>" method="POST" autocomplete="off">
                <?= csrf_field() ?>
                <div class="row ">
                    <div class="col-6">
                        <div class="form-group required">
                            <label>Password Baru</label>
                            <input type="password" maxlength="50" class="form-control <?=!empty($error['passwd']) ? 'is-invalid' : null ?>" name="passwd">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['passwd']) ? $error['passwd'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group required">
                            <label>Ulangi Password Baru</label>
                            <input type="password" maxlength="50" class="form-control <?=!empty($error['confirm_passwd']) ? 'is-invalid' : null ?>" name="confirm_passwd">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['confirm_passwd']) ? $error['confirm_passwd'] : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" maxlength="200" class="form-control" name="user_id" value="<?=$user_id ?>">
                <button type="submit" id="btnSave" class="btn btn-primary"><i class="fa fa-share-square"></i> &nbsp; Update</button>
                <a href="<?=$url_back ?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Batal</a>
            </form>    
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('#form_change_passwd').confirm({
            title: 'Konfirmasi',
            text: 'Pastikan Input Password Sudah Benar. <br>Yakin Update Password Sekarang?',
            ask: false,
            btnConfirm: 'Yes',
            btnCancel: 'Cancel',
            btnType: 'primary'
        });
    });
</script>
<?=$this->endSection(); ?>