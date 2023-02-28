<?= $this->extend('home/layout') ?>
<?= $this->section('content') ?>

<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <?php foreach ($berita as $detBerita):?>
            <div class="owl-carousel-item position-relative" data-dot="<img src='<?= base_url('assets/upload/image/'.$detBerita->gambar);?>'>">
                <img class="img" src="<?= base_url('assets/upload/image/'.$detBerita->gambar);?>" alt="" height="600em">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown">
                                    <?= $detBerita->judul_berita;?>
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">
                                    <?= $detBerita->ringkasan;?>
                                </p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Selengkapnya <i class="fas fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Carousel End -->


<!-- Sambutan Kepsek  -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <?php foreach ($sambutan as $sambut): ?>

            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="<?= base_url('assets/upload/image/'.$sambut->foto);?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <h6 class="text-primary">Sambutan Kepala Sekolah SMAS Muhammadiyah Kendari</h6>
                        <h1 class="mb-4"><?= $sambut->namakepsek;?></h1>
                        <p>
                            <?= $sambut->ringkasan;?>
                        </p>
                        <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Selengkapnya <i class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
<!-- Sambutan Kepsek End -->

<!-- Sarana & Prasarana Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary">Sarana & Prasarana Kami</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($sarpras as $detsarpras):?>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <img class="img-fluid" src="<?= base_url('assets/upload/image/'.$detsarpras->foto);?>" alt="<?= $detsarpras->nama;?>">
                        <div class="position-relative p-4 pt-0">
                            <div class="service-icon">
                                <i class="fas fa-building fa-3x"></i>
                            </div>
                            <h4 class="mb-3 text-center"><?= $detsarpras->nama;?></h4>
                        </div>
                    </div>
                </div>

            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- Sarana & Prasarana End -->

<!-- Berita Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary">Berita</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">Semua Berita</li>
                    <li class="mx-2" data-filter=".Berita">Berita</li>
                    <li class="mx-2" data-filter=".Pengumuman">Pengumuman</li>
                    <li class="mx-2" data-filter=".Umum">Umum</li>
                </ul>
            </div>
        </div>
        
        <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.5s">
            <?php foreach($berita2nd as $detBerita2nd):?>
            <div class="col-lg-4 col-md-6 portfolio-item <?= $detBerita2nd->kategori;?>">
                <div class="portfolio-img rounded overflow-hidden">
                    <img class="img-fluid" src="<?= base_url('assets/upload/image/'.$detBerita2nd->gambar);?>" alt="<?= $detBerita2nd->judul_berita;?>">
                    <div class="portfolio-btn">
                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="img/img-600x400-6.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i> </a>
                    </div>
                </div>
                <div class="pt-3">
                    <p class="text-primary mb-0"><?= $detBerita2nd->kategori;?></p>
                    <hr class="text-primary w-25 my-2">
                    <h5 class="lh-base"><?= $detBerita2nd->judul_berita;?></h5>
                    <span> <?= $detBerita2nd->ringkasan;?> </span>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        
    </div>
</div>
<!-- Berita End -->


<!-- Tendik Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Tenaga Pendidik</h6>
            <h1 class="mb-4">Tenaga Pendidik Yang Berpengalaman</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($tendik as $detTendik): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="d-flex">
                            <img class="img w-75" src="<?= base_url('assets/upload/image/'.$detTendik->foto);?>" alt="<?= $detTendik->nama;?>">
                            <div class="team-social w-25">
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="https://www.facebook.com/<?= $detTendik->facebook;?>"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="https://www.instagram.com/<?= $detTendik->instagram;?>"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5><?= $detTendik->nama;?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>