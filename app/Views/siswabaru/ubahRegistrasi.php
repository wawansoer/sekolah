<?= $this->extend('siswabaru/layout')?>
<?= $this->section('content') ?>
<div class="card mt-5">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Ubah Data Pendaftaran </h4>
  </div>
  <div class="card-content">
      <div class="card-body">
        <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo session()->getFlashdata('message'); ?> </strong> Silahkan Cetak Dan Melakukan Validasi Data  <a href="<?= base_url('calonsiswa'); ?>"> disini</a>. 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <?php if (!empty(session()->getFlashdata('gagal'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><?php echo session()->getFlashdata('gagal'); ?> </strong> 
          <?php echo session()->getFlashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <form class="form form-horizontal" method="post" action="<?= base_url('calonsiswa/prosesubah/'. $idCalonSiswa); ?>">
          <?= csrf_field(); ?>
          <input type="hidden" id="idCalonSiswa" name="idCalonSiswa" value="<?= $idCalonSiswa;?>">
          <input type="hidden" id="noPendaftaran" name="noPendaftaran" value="<?= $noPendaftaran;?>">
          <div class="form-body">
            <div class="row">
              <div class="col-md-4">
                <label>Nama Lengkap</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="text" id="namaLengkap" class="form-control" name="namaLengkap" placeholder="Nama Lengkap Sesuai Akte Kelahiran" required value="<?= $namaLengkap;?>">
            </div>
            <div class="col-md-4">
                <label>NISN</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="number" id="nisn" class="form-control" name="nisn" placeholder="Nomor Induk Siswa Nasional" value="<?= $nisn;?>" required>
            </div>
            <div class="col-md-4">
                <label>Tempat Lahir</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="text" id="tempatLahir" class="form-control" name="tempatLahir" placeholder="Tempat Lahir Sesuai Akte Kelahiran" value="<?= $tempatLahir;?>" required>
            </div>
            <div class="col-md-4">
                <label>Tanggal Lahir</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="date" id="tanggalLahir" class="form-control" name="tanggalLahir" placeholder="Tanggal Lahir" value="<?= $tanggalLahir;?>" required>
            </div>
            <div class="col-md-4">
                <label>Jenis Kelamin</label>
            </div>
            <div class="col-md-8 form-group">
                <select class="form-select" aria-label="Default select example" required name="jenisKelamin" id="jenisKelamin">
                  <option selected value="<?= $jenisKelamin;?>"><?= $jenisKelamin;?></option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
              </select>
          </div>
          <div class="col-md-4">
              <label>Agama</label>
          </div>
          <div class="col-md-8 form-group">
              <select class="form-select" aria-label="Default select example" required name="agama" id="agama" >
                <option value="<?= $agama;?>"><?= $agama;?></option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budhha">Budhha</option>
                <option value="Khonghucu">Khonghucu</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Alamat Lengkap</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="alamatSiswa" class="form-control" name="alamatSiswa" placeholder="Alamat Lengkap Domisili" required value="<?= $alamatSiswa;?>">
        </div>
        <div class="col-md-4">
            <label>Nomor Kontak Pribadi</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="number" id="noKontak" class="form-control" name="noKontak" placeholder="Nomor Kontak Yang Dapat dihubungi" value="<?= $noKontak;?>" required>
        </div>
        <div class="col-md-4">
            <label>Sekolah Asal</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="sekolahAsal" class="form-control" name="sekolahAsal" placeholder="Nama Sekolah Asal" value="<?= $sekolahAsal;?>" required>
        </div>
        <div class="col-md-4">
            <label>Nama Orang Tua/Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="namaWali" class="form-control" name="namaWali" placeholder="Nama Lengkap Orang Tua/Wali" value="<?= $namaWali;?>" required>
        </div>
        <div class="col-md-4">
            <label>Alamat Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="alamatWali" class="form-control" name="alamatWali" placeholder="Alamat Lengkap Orang Tua/Wali" value="<?= $alamatWali;?>" required>
        </div>
        <div class="col-md-4">
            <label>Nomor Kontak Orang Tua/Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="number" id="kontakOrtu" class="form-control" name="kontakOrtu" placeholder="Nomor Kontak Orang Tua/Wali Yang Dapat dihubungi" value="<?= $kontakOrtu;?>" required>
        </div>
        <div class="col-md-4">
            <label>Agama Orang Tua/Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <select class="form-select" aria-label="Default select example" required name="agamaWali" id="agamaWali" >
              <option selected value="<?= $agamaWali;?>"><?= $agamaWali;?> </option>
              <option value="Islam">Islam</option>
              <option value="Protestan">Protestan</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Budhha">Budhha</option>
              <option value="Khonghucu">Khonghucu</option>
          </select>
      </div>
      <div class="col-md-4">
          <label>Pekerjaan Orang Tua/Wali</label>
      </div>
      <div class="col-md-8 form-group">
          <select class="form-select" aria-label="Default select example" required name="pekerjaanWali" id="pekerjaanWali" >
           <option selected value="<?= $pekerjaanWali;?>"> <?= $pekerjaanWali;?> </option>
           <option value="PNS">PNS</option>
           <option value="TNI">TNI</option>
           <option value="Polisi">Polisi</option>
           <option value="Karyawan Swasta">Karyawan Swasta</option>
           <option value="Wiraswasta">Wiraswasta</option>
           <option value="Wartawan">Wartawan</option>
           <option value="Dosen/Guru">Dosen/Guru</option>
           <option value="Buruh Harian">Buruh Harian</option>
           <option value="Lainnya">Lainnya</option>
       </select>
   </div>
   <div class="col-md-4">
     <label>Pendapatan Bulanan Orang Tua/Wali</label>
 </div>
 <div class="col-md-8 form-group">
     <select class="form-select" aria-label="Default select example" required name="pendapatanWali" id="pendapatanWali">
       <option selected value="<?= $pendapatanWali;?>"> <?= $pendapatanWali;?> </option>
       <option value="Kurang Dari Rp 1.500.000">Kurang Dari Rp 1.500.000</option>
       <option value="Rp 1.500.000 - Rp 3.000.000">Rp 1.500.000 s/d Rp 3.000.000</option>
       <option value="Rp 3.000.000 - Rp 5.000.000">Rp 3.000.000 s/d Rp 5.000.000</option>
       <option value="Lebih Dari Rp 5.000.000">Lebih Dari Rp 5.000.000</option>
   </select>
</div>
<div class="col-sm-12 d-flex justify-content-end">
  <button type="submit" class="btn btn-primary me-2 mb-2">Simpan</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?= $this->endSection() ?>