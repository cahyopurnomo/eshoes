<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0"><?=$header_text?> Banner</h1>
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
            <form id="form_banner" action="<?=$url_save ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group required">
                            <label>Judul Banner</label>
                            <input type="text" maxlength="100" class="form-control <?=!empty($error['banner_name']) ? 'is-invalid' : null ?>" name="banner_name" value="<?=!empty($banner_name) ? $banner_name : old('banner_name') ?>">
                            <input type="hidden" class="form-control" name="banner_id" value="<?=!empty($banner_idx) ? $banner_idx : '' ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['banner_name']) ? $error['banner_name'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group required">
                            <label>File Banner</label>
                            <input type="file" class="form-control" name="banner_image">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['banner_image']) ? $error['banner_image'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group required">
                            <label>Posisi</label>
                            <select name="position" class="form-control">
                                <option value="">--Pilih Posisi--</option>
                                <option value="BANNER 1" <?=(!empty($position) && $position == 'BANNER 1') || ('TOP' == old('position')) ? 'selected' : ''; ?>>BANNER 1</option>
                                <?php if(session()->get('loggedAs') == 'tenant'): ?>
                                <option value="BANNER 2" <?=(!empty($position) && $position == 'BANNER 2') || ('BANNER 2' == old('position')) ? 'selected' : ''; ?>>BANNER 2</option>
                                <option value="BANNER 3" <?=(!empty($position) && $position == 'BANNER 3') || ('BANNER 3' == old('position')) ? 'selected' : ''; ?>>BANNER 3</option>
                                <option value="BANNER 4" <?=(!empty($position) && $position == 'BANNER 4') || ('BANNER 4' == old('position')) ? 'selected' : ''; ?>>BANNER 4</option>
                                <option value="BANNER 5" <?=(!empty($position) && $position == 'BANNER 5') || ('BANNER 5' == old('position')) ? 'selected' : ''; ?>>BANNER 5</option>
                                <option value="BANNER 6" <?=(!empty($position) && $position == 'BANNER 6') || ('BANNER 6' == old('position')) ? 'selected' : ''; ?>>BANNER 6</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group required">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">--Pilih Status--</option>
                                <option value="ON" <?=(!empty($status) && $status == 'ON') || ('ON' == old('status')) ? 'selected' : ''; ?>>Aktif</option>
                                <option value="OFF" <?=(!empty($status) && $status == 'OFF') || ('OFF' == old('status')) ? 'selected' : ''; ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <img style="width: 100%; max-width: 100%;" src="<?=!empty($banner_image) ? $banner_image : ''; ?>" alt="Katalog Sepatu Indonesia">
                        </div>
                    </div>
                </div>
                <button type="submit" id="btnSave" class="btn btn-primary"><i class="fa fa-share-square"></i> &nbsp; <?=$btn_text ?></button>
                <a href="<?=$url_back ?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Batal</a>
            </form>    
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('.select2').select2();
        
        // let csrfToken = '<?=csrf_token() ?>';
        // let csrfHash = '<?=csrf_hash() ?>';
        //EDIT MODE
        
        $('#form_banner').confirm({
            title: 'Konfirmasi',
            text: 'Pastikan Input Data Sudah Benar. <br>Yakin Simpan Data Banner Sekarang?',
            ask: false,
            btnConfirm: 'Yes',
            btnCancel: 'Cancel',
            btnType: 'primary'
        });
    });
</script>
<?=$this->endSection(); ?>