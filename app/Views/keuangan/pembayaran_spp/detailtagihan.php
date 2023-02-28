<?= $this->extend('keuangan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4> Rincian Tagihan SPP Siswa </h4>
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
                        <th class="text-center">Periode</th>
                        <th class="text-center">Total Tagihan</th>
                        <th class="text-center">Total Bayar</th>
                        <th class="text-center">Sisa Tagihan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rincian as $detSPP) : ?>
                        <tr class="text-center">
                            <td> <?= $detSPP->periode; ?> </td>
                            <td> <?= rp($detSPP->tagihan); ?> </td>
                            <td> <?= rp($detSPP->bayar); ?> </td>
                            <td> <?= rp($detSPP->sisa); ?> </td>
                            <td>
                                <?php
                                if ($detSPP->sisa > 0) {
                                ?>
                                    <a href="<?= base_url('/keuangan/bayartagihan/' . base64_encode($detSPP->idSiswa) . '/' . base64_encode($detSPP->idPeriode)); ?>">
                                        <button type="button" class="btn btn-warning btn-sm bg-gradient mx-auto text-dark">
                                            <i class="fas fa-money-bill-wave"></i>
                                            Bayar
                                        </button>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <button type="button" class="btn btn-success btn-sm bg-gradient mx-auto">
                                        <i class="fas fa-receipt"></i>
                                        Lunas
                                    </button>
                                <?php
                                }
                                ?>


                            </td>
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