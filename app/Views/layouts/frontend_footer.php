<main class="col-top-footer pt-5 pb-6 text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>
                    <img src="<?=base_url('assets/custom/img/kementrianPerdagangan.webp') ?>" class="img-kementrian mb-4">
                    <img src="<?=base_url('assets/custom/img/Bangga-Buatan-Indonesia.webp') ?>" class="img-bangga-indonesia mb-4">
                    <img src="<?=base_url('assets/custom/img/aprisindo.png') ?>" class="img-aprisindo mb-4">
                </p>
                <h3 class="subtitle mb-2 bold">#<span>Ayo</span>Dagang</h3>
                <h3 class="title pb-4 mb-4 bold">Katalog Elektronik Produk Sepatu Indonesia</h3>
                <p class="mb-0">
                    Dalam mewujudkan Visi Indonesia menjadi salah satu pusat Sepatu di Dunia, Direktorat Penggunaan dan Pemasaran Produk Dalam Negeri, Direktorat Jenderal Perdagangan Dalam Negeri, Kementerian Perdagangan mendukung promosi produk sepatu dalam negeri melalui katalog elektronik.
                </p>
                
                <p class="mt-3 mb-0" style="<?=!empty($segment) && $segment == 'about-us' ? 'display: none !important;' : '' ?>">
                    <a href="<?=base_url('about-us') ?>" class="text-green medium-bold">Pelajari lebih lanjut &nbsp;<i class="fa fa-angle-double-right"></i></a>
                </p>
            </div>
        </div>
    </div>
</main>
<footer class="footer text-center mt-auto py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-white mb-0">
                    © 2023. Kementerian Perdagangan Republik Indonesia.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- MODAL FORM SEARCH -->
<div class="modal fade" id="modal-search" tabindex="-1" aria-labelledby="modal-search" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="row" method="get" action="<?=base_url('search') ?>" autocomplete="off">
                    <div class="col-9">
                        <input type="search" name="k" class="form-control" placeholder="Cari Sepatu ...">
                    </div>
                    <div class="col-3">
                        <input type="submit" class="btn text-white medium-bold btn-primary w-100 mb-0" value="Cari">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>