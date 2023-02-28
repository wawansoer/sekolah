<?= $this->extend('keuangan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4> Formulir Penambahan Transaksi <?= $id; ?></h4>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Mohon maaf Gagal Simpan Data ! </strong> <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('keuangan/prosestambahtransaksi') ?>" method="post" accept-charset="utf-8">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="idNamaTrx" class="col-sm-4 col-form-label">Pilih Transaksi</label>
                    <div class="col-sm-8">
                        <select name="idNamaTrx" class="form-control" required>
                            <option <?= (old('idNamaTrx') == "" ? "selected" : ""); ?>> -- Pilih Nama Transaksi -- </option>
                            <?php foreach ($namaTrx as $detTrx) : ?>
                                <option value="<?= $detTrx->idNamaTrx; ?>" <?= (old('idNamaTrx') == "$detTrx->idNamaTrx" ? "selected" : ""); ?>><?= $detTrx->namaTransaksi; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-block text-end">
                    <button type="submit" class="btn btn-success bg-gradient">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
<?= $this->endSection() ?>