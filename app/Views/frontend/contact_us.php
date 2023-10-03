<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page mb-4">
    <div class="container">
        <div class="row col-contact mb-4">
            <div class="col-6 col-6-img-kk">
                <img src="<?=base_url('assets/img/image-kontak.png') ?>">
            </div>
            <div class="col-6">
                <h5 class="bold mb-4">Kontak Kami</h5>
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <?=session()->getFlashdata('success')?>
                    </div>
                </div>
                <?php endif; ?>
                <?php $error = validation_errors(); ?>
                <form method="post" action="<?=base_url('submit-contact-us') ?>" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 form-group required">
                                <label class="form-label text-grey">Nama Depan</label>
                                <input type="text" name="firstname" class="form-control <?=!empty($error['firstname']) ? 'is-invalid' : null ?>" placeholder="Nama Depan">
                                <div class="invalid-feedback d-block">
                                    <?=!empty($error['firstname']) ? $error['firstname'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 form-group">
                                <label class="form-label text-grey">Nama Belakang</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Nama Belakang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 form-group required">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control text-grey <?=!empty($error['email']) ? 'is-invalid' : null ?>" placeholder="email@gmail.com">
                                <div class="invalid-feedback d-block">
                                    <?=!empty($error['email']) ? $error['email'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 form-group">
                                <label class="form-label text-grey">Nomor Telepon</label>
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="15" name="phone" class="form-control" placeholder="Nomor Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 form-group required">
                                <label class="form-label">Judul</label>
                                <input type="text" name="title" class="form-control <?=!empty($error['title']) ? 'is-invalid' : null ?>" placeholder="Judul">
                                <div class="invalid-feedback d-block">
                                    <?=!empty($error['title']) ? $error['title'] : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 form-group required">
                                <label class="form-label">Pesan</label>
                                <textarea name="message" class="form-control <?=!empty($error['message']) ? 'is-invalid' : null ?>" rows="3"></textarea>
                                <div class="invalid-feedback d-block">
                                    <?=!empty($error['message']) ? $error['message'] : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" class="btn text-white medium-bold btn-primary mt-4" value="Kirim Pesan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?=$this->endSection(); ?>