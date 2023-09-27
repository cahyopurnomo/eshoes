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
                    <div class="col-12">
                        <div class="form-group required">
                            <label>Judul Produk</label>
                            <input type="text" maxlength="100" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)" class="form-control <?=!empty($error['product_name']) ? 'is-invalid' : null ?>" name="product_name" id="product_name" value="<?=!empty($product_name) ? $product_name : old('product_name') ?>">
                            <input type="hidden" class="form-control" name="product_id" value="<?=!empty($product_idx) ? $product_idx : '' ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['product_name']) ? $error['product_name'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group required">
                            <label>Slug</label>
                            <input type="text" maxlength="100" class="form-control <?=!empty($error['slug']) ? 'is-invalid' : null ?>" name="slug" id="slug" value="<?=!empty($slug) ? $slug : old('slug') ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['slug']) ? $error['slug'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group required">
                            <label>Kategori</label>
                            <select name="category" class="form-control select2">
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($category as $key => $row): ?>
                                    <option value="<?=$row['category_idx'] ?>" <?=(!empty($category_id) && $category_id == $row['category_idx']) || ($row['category_idx'] == old('position')) ? 'selected' : ''; ?>><?=$row['category_name'] ?></option>
                                    <?php if (!empty($row['sub_categories'])): ?>
                                        <?php foreach ($row['sub_categories'] as $k => $rec): ?>
                                            <option value="<?=$row['category_idx'] ?>" <?=(!empty($category_id) && $category_id == $rec['category_idx']) || ($rec['category_idx'] == old('position')) ? 'selected' : ''; ?>>&nbsp--&nbsp<?=$rec['category_name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
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
                    <div class="col-12">
                        <div class="form-group required">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control <?=!empty($error['description']) ? 'is-invalid' : null ?>" cols="30" rows="10"><?=!empty($description) ? $description : old('description') ?></textarea>
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['description']) ? $error['description'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group required">
                            <label>Gambar Produk 1</label>
                            <input type="file" class="form-control" name="image1">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['image1']) ? $error['image1'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Gambar Produk 2</label>
                            <input type="file" class="form-control" name="image2">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['image2']) ? $error['image2'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Gambar Produk 3</label>
                            <input type="file" class="form-control" name="image3">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['image3']) ? $error['image3'] : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group">
                            <img style="width: 100%; max-width: 100%;" src="<?=!empty($image1) ? $image1 : '' ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <img style="width: 100%; max-width: 100%;" src="<?=!empty($image2) ? $image2 : '' ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <img style="width: 100%; max-width: 100%;" src="<?=!empty($image3) ? $image3 : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group" style="text-align: center;">
                            <a data-toggle="confirm" data-title="Konfirmasi" data-text="Yakin Gambar Produk 1 Dihapus ?" href="<?=base_url('tenant/delete-image/1/'.$product_idx) ?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Delete Image 1</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group" style="text-align: center;">
                            <a data-toggle="confirm" data-title="Konfirmasi" data-text="Yakin Gambar Produk 2 Dihapus ?" href="<?=base_url('tenant/delete-image/2/'.$product_idx) ?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Delete Image 2</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group" style="text-align: center;">
                            <a data-toggle="confirm" data-title="Konfirmasi" data-text="Yakin Gambar Produk 3 Dihapus ?" href="<?=base_url('tenant/delete-image/3/'.$product_idx) ?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Delete Image 3</a>
                        </div>
                    </div>
                </div>
                
                <button type="submit" id="btnSave" class="btn btn-primary"><i class="fa fa-share-square"></i> &nbsp; <?=$btn_text ?></button>
                <a href="<?=base_url('tenant/product') ?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Batal</a>
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
            text: 'Pastikan Input Data Sudah Benar. <br>Yakin Simpan Data Produk Sekarang?',
            ask: false,
            btnConfirm: 'Yes',
            btnCancel: 'Cancel',
            btnType: 'primary'
        });

        $('#product_name').on('keyup', function(){
            title = $(this).val();
            slug = createSlug(title);
            $('#slug').val(slug);
        });

        function createSlug(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }
    });
</script>
<?=$this->endSection(); ?>