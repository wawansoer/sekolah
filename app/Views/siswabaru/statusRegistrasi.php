<?= $this->extend('siswabaru/layout') ?>
<?= $this->section('content') ?>
<div class="card mt-5">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Data Pendaftaran</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo session()->getFlashdata('message'); ?> </strong> Silahkan Cetak Dan Melakukan Validasi Data. 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
      <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col" colspan="3">Data Siswa</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Nomor Pendaftaran</td>
            <td>:</td>
            <td> <?= $noPendaftaran;?> </td>
          </tr>
          <tr>
            <td>NISN</td>
            <td>:</td>
            <td> <?= $nisn;?> </td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td> <?= $namaLengkap;?> </td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td> <?= $jenisKelamin;?> </td>
          </tr>
          <tr>
            <td>Agama</td>
            <td>:</td>
            <td> <?= $agama;?> </td>
          </tr>
          <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td> <?= $tempatLahir;?>, <?= tgl_indo($tanggalLahir);?> </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td> <?= $alamatSiswa;?> </td>
          </tr>
          <tr>
            <td>Nomor Kontak</td>
            <td>:</td>
            <td> <?= $noKontak;?> </td>
          </tr>
          <tr>
            <td>Sekolah Asal</td>
            <td>:</td>
            <td> <?= $sekolahAsal;?> </td>
          </tr>
          <tr>
            <td colspan="3"><b>Data Orang Tua/Wali</td>
            </tr>
            <tr>
              <td>Nama Orang Tua/Wali</td>
              <td>:</td>
              <td> <?= $namaWali;?> </td>
            </tr>
            <tr>
              <td>Alamat Orang Tua/Wali</td>
              <td>:</td>
              <td> <?= $alamatWali;?> </td>
            </tr>
            <tr>
              <td>Nomor Kontak Orang Tua/Wali</td>
              <td>:</td>
              <td> <?= $kontakOrtu;?> </td>
            </tr>
            <tr>
              <td>Agama Orang Tua/Wali</td>
              <td>:</td>
              <td> <?= $agamaWali;?> </td>
            </tr>
            <tr>
              <td>Pekerjaan Orang Tua/Wali</td>
              <td>:</td>
              <td> <?= $pekerjaanWali;?> </td>
            </tr>
            <tr>
              <td>Pendapatan Orang Tua/Wali</td>
              <td>:</td>
              <td> <?= $pendapatanWali;?> </td>
            </tr>
          </tbody>
        </table>
        <div class="col-sm-12 d-flex justify-content-end">
          <a title="Edit" href="<?= base_url("calonsiswa/ubahData/$noPendaftaran"); ?>" class="btn btn-primary me-2 mb-2">Edit</a>
          <a title="Edit" href="<?= base_url("calonsiswa/cetak/$noPendaftaran"); ?>" class="btn btn-success me-2 mb-2">Cetak</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
