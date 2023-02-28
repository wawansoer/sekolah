<?= $this->extend('keuangan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <img class="img-fluid w-80 rounded-3 rounded mx-auto d-block" src="<?= base_url('assets/upload/image/' . $gambar); ?>">
            </div>
            <br>
            <p class="text-center">
                <small>
                    <?= $username; ?> |
                    <?= tgl_indo($created_at); ?>
                </small>
            </p>

            <hr>
            <h3 class="card-title text-center"><?= $pengumuman; ?></h3>
            <p class="card-text">
                <?= $deskripsi; ?>
            </p>
            <p class="text-center">
                <br>
                <a href="<?= base_url('assets/upload/doc/' . $berkas); ?>">
                    <span class="badge bg-primary">
                        <i class="fas fa-file-pdf"></i> Lampiran Berkas
                    </span>
                </a>
            </p>

            <br>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="<?= base_url('/keuangan/pengumuman'); ?>">
                <button class="btn btn-primary">
                    <i class="bi bi-arrow-left-square-fill"></i> Kembali
                </button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?= base_url('/keuangan/ubahpengumuman/' . $id_pengumuman); ?>">
                <button class="btn btn-success">
                    <i class="bi bi-pencil-square"></i> Ubah
                </button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?= base_url('/keuangan/hapuspengumuman/' . $id_pengumuman); ?>">
                <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $pengumuman; ?> ?')">
                    <i class="bi bi-trash-fill"></i> Hapus
                </button>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>