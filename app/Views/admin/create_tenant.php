<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0"><?=$header_text?> Data Tenant</h1>
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
            <form id="form_tenant" action="<?=$url ?>" method="POST" autocomplete="off">
            <?= csrf_field() ?>
                <div class="row mb-3">
                    <div class="col-3">
                        <div class="form-group required">
                            <label>Nama Brand</label>
                            <input type="text" maxlength="100" class="form-control <?=!empty($error['tenant_name']) ? 'is-invalid' : null ?>" name="tenant_name" value="<?=!empty($tenant_name) ? $tenant_name : old('tenant_name') ?>">
                            <input type="hidden" maxlength="4" class="form-control" name="tenant_id" value="<?=!empty($tenant_idx) ? $tenant_idx : '' ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['tenant_name']) ? $error['tenant_name'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group required">
                            <label>Email</label>
                            <input type="email" maxlength="100" class="form-control <?=!empty($error['email']) ? 'is-invalid' : null ?>" name="email" value="<?=!empty($email) ? $email : old('email') ?>">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['email']) ? $error['email'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group required">
                            <label>Password</label>
                            <input type="password" maxlength="100" class="form-control <?=!empty($error['passwd']) ? 'is-invalid' : null ?>" name="passwd">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['passwd']) ? $error['passwd'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group required">
                            <label>Konfirmasi Password</label>
                            <input type="password" maxlength="100" class="form-control <?=!empty($error['confirm_passwd']) ? 'is-invalid' : null ?>" name="confirm_passwd">
                            <div class="invalid-feedback d-block">
                                <?=!empty($error['confirm_passwd']) ? $error['confirm_passwd'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group required">
                            <label>Nomor Seluler (WA)</label>
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="15" class="form-control <?=!empty($error['phone']) ? 'is-invalid' : null ?>" name="phone" value="<?=!empty($phone) ? $phone : old('phone') ?>">
                        </div>
                        <div class="invalid-feedback d-block">
                            <?=!empty($error['phone']) ? $error['phone'] : '' ?>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group required">
                            <label>Propinsi</label>
                            <select name="province_name" id="province_name" class="form-control select2 <?=!empty($error['province_name']) ? 'is-invalid' : null ?>">
                            <option value="">--Pilih Propinsi--</option>
                            <?php foreach ($province as $key => $row) : ?>
                                <option value="<?=$row['province_idx'] ?>" <?=(!empty($province_idx) && $row['province_idx'] == $province_idx) || ($row['province_idx'] == old('province')) ? 'selected' : ''; ?>><?=$row['province'] ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="invalid-feedback d-block">
                            <?=!empty($error['province_name']) ? $error['province_name'] : '' ?>
                        </div>
                    </div>    
                    <div class="col-3">
                        <div class="form-group required">
                            <label>Kota</label>
                            <select name="city_name" id="city_name" class="form-control select2 <?=!empty($error['city_name']) ? 'is-invalid' : null ?>">
                                <!-- <option value="">--Pilih Kota/Kabupaten--</option> -->
                            </select>
                        </div>
                        <div class="invalid-feedback d-block">
                            <?=!empty($error['city_name']) ? $error['city_name'] : '' ?>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input class="form-control" maxlength="30" name="facebook" value="<?=!empty($facebook) ? $facebook : old('facebook') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Instagram</label>
                            <input class="form-control" maxlength="30" name="instagram" value="<?=!empty($instagram) ? $instagram : old('instagram') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>LinkedIn</label>
                            <input class="form-control" maxlength="30" name="linkedin" value="<?=!empty($linkedin) ? $linkedin : old('linkedin') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Twitter</label>
                            <input class="form-control" maxlength="30" name="twitter" value="<?=!empty($twitter) ? $twitter : old('twitter') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Youtube</label>
                            <input class="form-control" maxlength="30" name="youtube" value="<?=!empty($youtube) ? $youtube : old('youtube') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tiktok</label>
                            <input class="form-control" maxlength="30" name="tiktok" value="<?=!empty($tiktok) ? $tiktok : old('tiktok') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tokopedia</label>
                            <input class="form-control" maxlength="30" name="tokopedia" value="<?=!empty($tokopedia) ? $tokopedia : old('tokopedia') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Lazada</label>
                            <input class="form-control" maxlength="30" name="lazada" value="<?=!empty($lazada) ? $lazada : old('lazada') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Shopee</label>
                            <input class="form-control" maxlength="30" name="shopee" value="<?=!empty($shopee) ? $shopee : old('shopee') ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Blibli</label>
                            <input class="form-control" maxlength="30" name="blibli" value="<?=!empty($blibli) ? $blibli : old('blibli') ?>">
                        </div>
                    </div>
                    <?php if (!empty($tenant_idx) && $tenant_idx > 0): ?>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="ACTIVE" <?=$status == 'ACTIVE' ? 'selected' : '' ?>>ACTIVE</option>
                                <option value="SUSPENDED" <?=$status == 'SUSPENDED' ? 'selected' : '' ?>>SUSPENDED</option>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <button type="submit" id="btnSave" class="btn btn-primary"><i class="fa fa-share-square"></i> &nbsp; <?=$btn_text ?></button>
                <a href="<?=base_url('admin/tenant');?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Batal</a>
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
        let province_idx = '<?=$province_idx ?>';
        let city_idx = '<?=$city_idx ?>';
        if (province_idx != '') {
            $('#province_name').val(province_idx).trigger('change');
            $('#province_name').trigger({
                type: 'select2:select',
                params: { data: province_idx }
            });
            
            url = "<?=site_url('admin/ajax-city');?>/"+province_idx;
            $('#city_name').load(url);
        
            setTimeout(function(){
                $('#city_name').val(city_idx).trigger('change');

                $('#city_name').trigger({
                    type: 'select2:select',
                    params: { data: city_idx }
                });
            },1000);
        }

        //ADD MODE
        $('#province_name').on('select2:select', function(e) {
            id = e.params.data.id;
            url = "<?=site_url('admin/ajax-city');?>/"+id;
            $('#city_name').load(url);
        });

        $('#form_tenant').confirm({
            title: 'Konfirmasi',
            text: 'Pastikan Input Data Sudah Benar. <br>Yakin Simpan Data Tenant Sekarang?',
            ask: false,
            btnConfirm: 'Yes',
            btnCancel: 'Cancel',
            btnType: 'primary'
        });
    });
</script>
<?=$this->endSection(); ?>