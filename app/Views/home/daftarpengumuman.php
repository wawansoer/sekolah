<?= $this->extend('home/layout') ?>
<?= $this->section('content') ?>



<!-- Berita Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="text-primary">Pengumuman</h1>
        </div>
        <form action="<?= base_url('/caripengumuman') ?>" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="cari" id="cari">
                <button class="btn btn-outline-success" type="submit" id="button-addon1">Cari Pengumuman</button>
            </div>
        </form>
        <br>
        <div class="row g-4 portfolio-container">
            <?php foreach ($pengumuman as $det) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="<?= base_url('assets/upload/image/' . $det['gambar']); ?>" alt="<?= $det['pengumuman']; ?>">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="<?= base_url('assets/upload/image/' . $det['gambar']); ?>" data-lightbox="portfolio">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base"><?= $det['pengumuman']; ?></h5>
                        <span> <?= substr($det['deskripsi'], 0, 150); ?> </span>
                        <a href="<?= base_url('pengumuman/' . $det['id_pengumuman']); ?>">
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
        <?= $pager->links('pengumuman', 'bootstrap_pagination') ?>
    </div>
</div>
<!-- pengumuman End -->

<?= $this->endSection() ?>