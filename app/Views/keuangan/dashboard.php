<?= $this->extend('keuangan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-6 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="fas fa-money-check-alt fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-muted font-semibold">Periode SPP</h5>
                        <h6 class="font-extrabold mb-0">
                            <a href="<?= base_url('/keuangan/periodespp/'); ?>">
                                Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="fas fa-money-bill-wave fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-muted font-semibold">Pembayaran SPP</h5>
                        <h6 class="font-extrabold mb-0">
                            <a href="<?= base_url('/keuangan/bayarspp/'); ?>">
                                Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="fas fa-money-bill-wave fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-muted font-semibold">Transaksi</h5>
                        <h6 class="font-extrabold mb-0">
                            <a href="<?= base_url('/keuangan/transaksi/'); ?>">
                                Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<?= $this->endSection() ?>