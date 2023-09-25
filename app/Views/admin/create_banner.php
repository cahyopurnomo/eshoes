<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content_admin'); ?>

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
            <form id="form_category" action="<?=$url ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group required">
                            <label>Nama Banner</label>
                            <input type="text" maxlength="100" class="form-control <?=!empty($error['banner_name']) ? 'is-invalid' : null ?>" name="category_name" value="<?=!empty($banner_name) ? $banner_name : old('banner_name') ?>">
                            <input type="hidden" maxlength="4" class="form-control" name="banner_id" value="<?=!empty($banner_idx) ? $banner_idx : '' ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['banner_name']) ? $error['banner_name'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group required">
                            <label>File Banner</label>
                            <input type="file" class="form-control" name="image">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['image']) ? $error['image'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Posisi</label>
                            <select name="position" class="form-control">
                                <option value="0">--Pilih Posisi--</option>
                                <option value="TOP">Top</option>
                                <option value="MIDDLE">Middle</option>
                                <option value="BOTTOM">Bottom</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="position" class="form-control">
                                <option value="0">--Pilih Status--</option>
                                <option value="ON">On</option>
                                <option value="OFF">Off</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <img width="100%" src="<?=base_url('assets/uploads/banner/banner1.jpg') ?>" alt="Katalog Sepatu Indonesia">
                        </div>
                    </div>
                </div>
                <button type="submit" id="btnSave" class="btn btn-primary"><i class="fa fa-share-square"></i> &nbsp; <?=$btn_text ?></button>
                <a href="<?=base_url('admin/category');?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Batal</a>
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
        
        $('#form_category').confirm({
            title: 'Konfirmasi',
            text: 'Pastikan Input Data Sudah Benar. <br>Yakin Simpan Data Kategori Sekarang?',
            ask: false,
            btnConfirm: 'Yes',
            btnCancel: 'Cancel',
            btnType: 'primary'
        });
    });
</script>
<?=$this->endSection(); ?>