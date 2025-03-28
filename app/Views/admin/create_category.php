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
            <form id="form_category" action="<?=$url ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Induk Kategori</label>
                            <select name="parent_category" class="form-control select2">
                            <option value="0">--Pilih Induk Kategori--</option>
                            <?php foreach ($category as $key => $row): ?>
                                <option value="<?=$row['category_idx'] ?>" <?=$parent_idx == $row['category_idx'] || ($row['category_idx'] == old('parent_category')) ? 'selected' : ''; ?>><?=$row['category_name'] ?></option>
                                <?php if (!empty($row['sub_categories'])): ?>
                                    <?php foreach ($row['sub_categories'] as $k => $rec): ?>
                                        <option value="<?=$rec['category_idx'] ?>" <?=$parent_idx == $rec['category_idx'] || ($rec['category_idx'] == old('parent_category')) ? 'selected' : ''; ?>>&nbsp--&nbsp<?=$rec['category_name'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                            <input type="hidden" maxlength="4" class="form-control" name="category_id" value="<?=!empty($category_idx) ? $category_idx : '' ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Nama Kategori</label>
                            <input type="text" maxlength="100" class="form-control <?=!empty($error['category_name']) ? 'is-invalid' : null ?>" name="category_name" value="<?=!empty($category_name) ? $category_name : old('category_name') ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['category_name']) ? $error['category_name'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Logo Tenant</label>
                            <input type="file" class="form-control <?=!empty($error['category_image']) ? 'is-invalid' : null ?>" name="category_image">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['category_image']) ? $error['category_image'] : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group">
                            <img style="width: 100%; background-position: center center; background-repeat: no-repeat; background-size: cover; max-width: 300px;" src="<?=!empty($category_image) ? $category_image : base_url('assets/uploads/banner/no-image.jpg'); ?>">
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