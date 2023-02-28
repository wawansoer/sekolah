<?= $this->extend('home/layout') ?>
<?= $this->section('content') ?>



<!-- Berita Start -->
<div class="container py-5">
    <?php foreach ($berita as $det) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <img src="<?= base_url('assets/upload/image/' . $det->gambar); ?>" class="d-block w-100 rounded" alt="<?= $det->judul_berita; ?>">
                <h1 class="text-primary text-center mt-3"><?= $det->judul_berita; ?></h1>
                <p class="text-center">
                    <small>
                        Ditulis Pada : <?= tgl_indo($det->tanggal_post) . " " . $det->waktu_post; ?> |
                        Oleh : <?= $det->username; ?>
                    </small>
                </p>
                <p class="card-text"> <?= $det->isi; ?> </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Berita End -->

<?= $this->endSection() ?>