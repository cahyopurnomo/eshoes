<?php $request = \Config\Services::request(); ?>
<nav class="navbar navbar-expand-lg fixed-top w3_megamenu">
    <div class="container-xxl">
        <a class="navbar-brand me-4" href="<?=base_url() ?>">
            <img src="<?=base_url('assets/custom/img/logo-katalog-sepatu-indonesia.png') ?>">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 medium-bold">
                <li class="nav-item">
                    <a class="nav-link <?=$request->uri->getSegment(1) == '' ? 'active' : '' ?>" aria-current="page" href="<?=base_url() ?>"><i class="fa fa-home"></i>&nbsp; Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=$request->uri->getSegment(1) == 'brand' ? 'active' : '' ?>" href="<?=base_url('brands') ?>"><i class="fa fa-tags"></i>&nbsp; Brand</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link <?=$request->uri->getSegment(1) == 'category' ? 'active' : '' ?>" href="#">
                        <i class="fa fa-list"></i>&nbsp; Kategori &nbsp;<i class="fa fa-angle-down"></i>
                    </a>
                    <div class='mega-menu'>
                        <div class="container">
                            <?php foreach ($category as $key => $row): ?>
                                <?php if (!empty($row['category_name'])): ?>
                                    <div class="item">
                                        <h6 class="bold text-green mb-2"><i class="fa fa-file-text-o"></i>&nbsp; <?=$row['category_name'] ?></h6>
                                        <ul>
                                            <?php if (!empty($row['sub_categories'])): ?>
                                                <?php foreach ($row['sub_categories'] as $k => $rec): ?>
                                                    <li><a href="<?=base_url('products?c='.$rec['category_slug']) ?>">-&nbsp; <?=$rec['category_name'] ?></a></li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=$request->uri->getSegment(1) == 'products' ? 'active' : '' ?>" href="<?=base_url('products?c=all') ?>"><i class="fa fa-star"></i>&nbsp; Produk</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-md-0 medium-bold">
                <li class="nav-item">
                    <a class="nav-link <?=$request->uri->getSegment(1) == 'about-us' ? 'active' : '' ?>" href="<?=base_url('about-us') ?>"><i class="fa fa-globe"></i>&nbsp; Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=$request->uri->getSegment(1) == 'contact-us' ? 'active' : '' ?>" href="<?=base_url('contact-us') ?>"><i class="fa fa-phone"></i>&nbsp; Kontak Kami</a>
                </li>
            </ul>
            <form class="d-flex form-search" role="search">
                <a href="<?=base_url('login') ?>" class="medium-bold text-green btn-login">
                    <i class="fa fa-user"></i>&nbsp; Login
                </a>
                <button type="button" class="btn medium-bold text-white btn-primary medium-bold btn-nav-search" data-bs-toggle="modal" data-bs-target="#modal-search">
                    <i class="fa fa-search"></i>&nbsp; Cari
                </button>
            </form>
        </div>
    </div>
</nav>