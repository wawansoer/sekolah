<?= $this->extend('kesiswaan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 ">
                        <h4> Daftar siswa </h4>
                    </div>
                    <div class="col-lg-6 col-md-12 d-grid gap-2 d-md-flex justify-content-md-end ">
                        <a href="<?= base_url('kesiswaan/tambahsiswa'); ?>">
                            <div class="text-end">
                                <button class="btn btn-primary" type="button">
                                    <i class="bi bi-plus-square-fill"></i>
                                    Tambah siswa
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success" role="alert">
                    <strong>Selamat ! </strong> <?php echo session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped" id="siswa">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">NISN</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $det) : ?>
                        <tr>
                            <td> <?= $det->nama; ?> </td>
                            <td> <?= $det->nis; ?> </td>
                            <td> <?= $det->nisn; ?> </td>
                            <td> <?= $det->jenis_kelamin; ?> </td>
                            <td> <?= $det->angkatan; ?> </td>
                            <td> <?= $det->nama_kelas; ?> </td>
                            <td> <?= $det->status; ?> </td>
                            <td class="text-center">
                                <a href="<?= base_url('/kesiswaan/detailsiswa/' . $det->idSiswa); ?>">
                                    <span class="badge bg-primary">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </span>
                                </a>
                                &nbsp;&nbsp
                                <a href="<?= base_url('/kesiswaan/ubahsiswa/' . $det->idSiswa); ?>">
                                    <span class="badge bg-success">
                                        <i class="bi bi-trash-fill"></i> Ubah
                                    </span>
                                </a>
                                &nbsp;&nbsp

                                <a href="<?= base_url('/kesiswaan/hapussiswa/' . $det->idSiswa); ?>">
                                    <span class="badge bg-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ?')">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </span>
                                </a>


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
    let table1 = document.querySelector('#siswa');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>