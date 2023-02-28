<?= $this->extend('home/layout') ?>
<?= $this->section('content') ?>



<!-- Berita Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="text-primary">Berita</h1>
        </div>
        <form action="<?= base_url('/cariberita') ?>" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="cari" id="cari">
                <button class="btn btn-outline-success" type="submit" id="button-addon1">Cari Berita</button>
            </div>
        </form>
        <br>
        <div class="row g-4 portfolio-container">
            <?php foreach ($berita as $detBerita2nd) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="<?= base_url('assets/upload/image/' . $detBerita2nd['gambar']); ?>" alt="<?= $detBerita2nd['judul_berita']; ?>">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="<?= base_url('assets/upload/image/' . $detBerita2nd['gambar']); ?>" data-lightbox="portfolio">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0"><?= $detBerita2nd['kategori']; ?></p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base"><?= $detBerita2nd['judul_berita']; ?></h5>
                        <span> <?= $detBerita2nd['ringkasan']; ?> </span>
                        <a href="<?= base_url('berita/' . $detBerita2nd['slug_judul']); ?>">
                            <button type="button" class="btn btn-link">Baca Selengkapnya</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<div class="container">
    <div class="row text-center">
        <?= $pager->links('berita', 'bootstrap_pagination') ?>
    </div>
</div>
<!-- Berita End -->

<?= $this->endSection() ?>