<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0"><?=$header_text?> Data Kategori</h1>
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
            <form id="form_user" action="<?=$url ?>" method="POST" autocomplete="off">
            <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Nama Lengkap</label>
                            <input type="text" maxlength="100" class="form-control <?=!empty($error['fullname']) ? 'is-invalid' : null ?>" name="fullname" value="<?=!empty($fullname) ? $fullname : old('fullname') ?>">
                            <input type="hidden" maxlength="4" class="form-control" name="user_id" value="<?=!empty($user_id) ? $user_id : '' ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['fullname']) ? $error['fullname'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Email</label>
                            <input type="email" maxlength="100" class="form-control <?=!empty($error['email']) ? 'is-invalid' : null ?>" name="email" value="<?=!empty($email) ? $email : old('email') ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['email']) ? $error['email'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Role</label>
                            <select name="role" class="form-control select2 <?=!empty($error['role']) ? 'is-invalid' : null ?>">
                                <option value="">--Pilih Role--</option>
                                <option value="ADMINISTRATOR" <?=!empty($role) && $role == 'ADMINISTRATOR' ? 'selected' : (old('role') == 'ADMINISTRATOR' ? 'selected' : ''); ?>>ADMINISTRATOR</option>
                                <option value="OPERATOR" <?=!empty($role) && $role == 'OPERATOR' ? 'selected' : (old('role') == 'OPERATOR' ? 'selected' : ''); ?>>OPERATOR</option>
                            </select>
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['role']) ? $error['role'] : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Password</label>
                            <input type="password" maxlength="100" class="form-control <?=!empty($error['passwd']) ? 'is-invalid' : null ?>" name="passwd">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['passwd']) ? $error['passwd'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Konfirmasi Password</label>
                            <input type="password" maxlength="100" class="form-control <?=!empty($error['confirm_passwd']) ? 'is-invalid' : null ?>" name="confirm_passwd">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['confirm_passwd']) ? $error['confirm_passwd'] : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="btnSave" class="btn btn-primary"><i class="fa fa-share-square"></i> &nbsp; <?=$btn_text ?></button>
                <a href="<?=base_url('admin/users');?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Batal</a>
            </form>    
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('#form_user').confirm({
            title: 'Konfirmasi',
            text: 'Pastikan Input Data Sudah Benar. <br>Yakin Simpan Data User Sekarang?',
            ask: false,
            btnConfirm: 'Yes',
            btnCancel: 'Cancel',
            btnType: 'primary'
        });
    });
</script>
<?=$this->endSection(); ?>