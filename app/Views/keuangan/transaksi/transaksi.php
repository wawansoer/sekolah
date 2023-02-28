<?= $this->extend('keuangan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h5> Aksi Pelaporan Keuangan </h5>
        </div>
        <div class="card-body">
            <strong> Pilih Periode Pelaporan Keuangan</strong>
            <form action="<?= base_url('keuangan/transaksi') ?>" method="post" accept-charset="utf-8">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="awal" id="awal">
                    <span class="input-group-text">s / d</span>
                    <input type="date" class="form-control" name="akhir" id="akhir">
                    <button type="submit" class="btn btn-success bg-gradient mx-auto">
                        Tampilkan <i class="fas fa-eye"></i>
                    </button>
                </div>
            </form>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-12 text-center py-1 d-grid gap-3">
                        <a href="<?= base_url('/keuangan/tambahtransaksi/Pemasukan'); ?>">
                            <button type="button" class="btn btn-primary bg-gradient mx-auto">
                                <i class="fas fa-plus-square"></i>
                                Tambah Pendapatan
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-12 text-center py-1 d-grid gap-3">
                        <a href="<?= base_url('/keuangan/tambahtransaksi/Pengeluaran'); ?>">
                            <button type="button" class="btn btn-danger bg-gradient mx-auto">
                                <i class="fas fa-plus-square"></i>
                                Tambah Pengeluaran
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-12 text-center py-1 d-grid gap-3">
                        <a href="<?= base_url('/keuangan/tambahjenistransaksi'); ?>">
                            <button type="button" class="btn btn-warning bg-gradient mx-auto text-dark">
                                <i class="fas fa-plus-square"></i>
                                Jenis Transaksi
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4> Laporan Transaksi Keuangan</h4>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Mohon maaf ! </strong> <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success" role="alert">
                    <strong>Selamat ! </strong> <?php echo session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped" id="periode">
                <thead>
                    <tr>
                        <th class="text-center">Jenis Transaksi </th>
                        <th class="text-center">Nama Transaksi</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi as $detTrans) : ?>
                        <tr class="text-center">
                            <td>
                                <?= $detTrans->jenis == "Pemasukan"  ? "<strong class='text-success'> Pemasukan </strong>" : "<strong class='text-danger'> Pengeluaran </strong>"; ?>
                            </td>
                            <td> <?= $detTrans->nama; ?></td>
                            <td> <?= rp($detTrans->jumlah); ?></td>
                            <td> <?= $detTrans->ket; ?></td>
                            <td> <?= $detTrans->waktu; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#periode');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>