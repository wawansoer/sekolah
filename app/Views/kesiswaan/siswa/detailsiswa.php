<?= $this->extend('kesiswaan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid rounded-2 rounded mx-auto d-block" src="<?= base_url('assets/upload/siswa/' . $foto); ?>">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td> Nama </td>
                                    <td> : </td>
                                    <td> <?= $nama; ?> </td>
                                </tr>
                                <tr>
                                    <td> NISN </td>
                                    <td> : </td>
                                    <td> <?= $nisn; ?> </td>
                                </tr>
                                <tr>
                                    <td> NIS </td>
                                    <td> : </td>
                                    <td> <?= $nis; ?> </td>
                                </tr>
                                <tr>
                                    <td> Kelas </td>
                                    <td> : </td>
                                    <td> <?= $nama_kelas; ?> </td>
                                </tr>
                                <tr>
                                    <td> Angkatan </td>
                                    <td> : </td>
                                    <td> <?= $angkatan; ?> </td>
                                </tr>
                                <tr>
                                    <td> Alamat Lengkap </td>
                                    <td> : </td>
                                    <td> <?= $alamat_domisili; ?>, <?= $pos_domisili; ?> </td>
                                </tr>
                                <tr>
                                    <td> Tempat, Tanggal Lahir </td>
                                    <td> : </td>
                                    <td> <?= $tempat_lahir; ?>, <?= tgl_indo($tanggal_lahir); ?></td>
                                </tr>
                                <tr>
                                    <td> Agama </td>
                                    <td> : </td>
                                    <td> <?= $agama; ?></td>
                                </tr>
                                <tr>
                                    <td> Jenis Kelamin </td>
                                    <td> : </td>
                                    <td> <?= $jenis_kelamin; ?></td>
                                </tr>
                                <tr>
                                    <td> Nomor Kontak </td>
                                    <td> : </td>
                                    <td> <?= $kontak_siswa; ?></td>
                                </tr>
                                <tr>
                                    <td> Nama Ayah </td>
                                    <td> : </td>
                                    <td> <?= $nama_bapak; ?></td>
                                </tr>
                                <tr>
                                    <td> Nama Ibu </td>
                                    <td> : </td>
                                    <td> <?= $nama_ibu; ?></td>
                                </tr>
                                <tr>
                                    <td> Alamat Orang Tua </td>
                                    <td> : </td>
                                    <td> <?= $alamat_ortu; ?>, <?= $pos_orang_tua; ?></td>
                                </tr>
                                <tr>
                                    <td> Pendapatan Orang Tua </td>
                                    <td> : </td>
                                    <td> <?= $pendapatan_ortu; ?></td>
                                </tr>
                                <tr>
                                    <td> Kontak Orang Tua </td>
                                    <td> : </td>
                                    <td> <?= $kontak_orangtua; ?></td>
                                </tr>
                                <tr>
                                    <td> Status </td>
                                    <td> : </td>
                                    <td> <?= $status; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="<?= base_url('/kesiswaan/siswa'); ?>">
                <button class="btn btn-primary">
                    <i class="bi bi-arrow-left-square-fill"></i> Kembali
                </button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?= base_url('/kesiswaan/ubahsiswa/' . $idSiswa); ?>">
                <button class="btn btn-success">
                    <i class="bi bi-pencil-square"></i> Ubah
                </button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?= base_url('/kesiswaan/hapussiswa/' . $idSiswa); ?>">
                <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ?')">
                    <i class="bi bi-trash-fill"></i> Hapus
                </button>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>