<?=$this->extend('layouts/frontend_template'); ?>
<?=$this->Section('main'); ?>
<main class="col-page mb-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <img src="<?=base_url('assets/img/image-kontak.png') ?>">
            </div>
            <div class="col-6">
                <h5 class="bold mb-4">Kontak Kami</h5>
                <form method="post" url="<?=base_url('submit-contact-us') ?>" autocomplete="off">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 required">
                                <label class="form-label text-grey">Nama Depan</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Nama Depan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label text-grey">Nama Belakang</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Nama Belakang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 required">
                                <label class="form-label text-grey">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email@gmail.com">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label text-grey">Nomor Telepon</label>
                                <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="title" class="form-control" placeholder="Judul">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea name="message" class="form-control" rows="3"></textarea>
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