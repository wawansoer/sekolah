<?= $this->extend('siswabaru/layout') ?>
<?= $this->section('content') ?>
<div class="card mt-5">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Formulir Pendaftaran Siswa Baru</h4>
    </div>
    <div class="card-content">
      <div class="card-body">

      <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4>Periksa Entrian Form</h4>
      </hr />
      <?php echo session()->getFlashdata('error'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <form class="form form-horizontal" method="post" action="<?= base_url('calonsiswa/simpan'); ?>">
    <?= csrf_field(); ?>
    <div class="form-body">
      <div class="row">
        <input type="hidden" name="status" id="status" value="Proses Daftar">
        <input type="hidden" name="noReg" id="noReg" value="<?= date('ymdGis'); ?>">
        <input type="hidden" name="idUser" id="idUser" value="<?= user_id(); ?>">
        <div class="col-md-4">
          <label>Nama Lengkap</label>
        </div>
        <div class="col-md-8 form-group">
          <input type="text" id="namaLengkap" class="form-control" name="namaLengkap" placeholder="Nama Lengkap Sesuai Akte Kelahiran" required value="<?= old('namaLengkap');?>">
        </div>
        <div class="col-md-4">
          <label>NISN</label>
        </div>
        <div class="col-md-8 form-group">
          <input type="number" id="nisn" class="form-control" name="nisn" placeholder="Nomor Induk Siswa Nasional" value="<?= old('nisn');?>" required>
        </div>
        <div class="col-md-4">
          <label>Tempat Lahir</label>
        </div>
        <div class="col-md-8 form-group">
          <input type="text" id="tempatLahir" class="form-control" name="tempatLahir" placeholder="Tempat Lahir Sesuai Akte Kelahiran" value="<?= old('tempatLahir');?>" required>
        </div>
        <div class="col-md-4">
          <label>Tanggal Lahir</label>
        </div>
        <div class="col-md-8 form-group">
          <input type="date" id="tanggalLahir" class="form-control" name="tanggalLahir" placeholder="Tanggal Lahir" value="<?= old('tanggalLahir');?>" required>
        </div>
        <div class="col-md-4">
          <label>Jenis Kelamin</label>
        </div>
        <div class="col-md-8 form-group">
          <select class="form-select" aria-label="Default select example" required name="jenisKelamin" id="jenisKelamin" value="<?= old('jenisKelamin');?>">
            <option selected>
              <-Pilih Jenis Kelamin->
              </option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="col-md-4">
            <label>Agama</label>
          </div>
          <div class="col-md-8 form-group">
            <select class="form-select" aria-label="Default select example" required name="agama" id="agama" value="<?= old('agama');?>">
              <option selected>
                <-Pilih Agama->
                </option>
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
              <input type="text" id="domisiliSiswa" class="form-control" name="domisiliSiswa" placeholder="Alamat Lengkap Domisili" required value="<?= old('domisiliSiswa');?>">
            </div>
            <div class="col-md-4">
              <label>Nomor Kontak Pribadi</label>
            </div>
            <div class="col-md-8 form-group">
              <input type="number" id="noKontak" class="form-control" name="noKontak" placeholder="Nomor Kontak Yang Dapat dihubungi" value="<?= old('noKontak');?>" required>
            </div>
            <div class="col-md-4">
              <label>Sekolah Asal</label>
            </div>
            <div class="col-md-8 form-group">
              <input type="text" id="sekolahAsal" class="form-control" name="sekolahAsal" placeholder="Nama Sekolah Asal" value="<?= old('sekolahAsal');?>" required>
            </div>
            <div class="col-md-4">
              <label>Nama Orang Tua/Wali</label>
            </div>
            <div class="col-md-8 form-group">
              <input type="text" id="namaWali" class="form-control" name="namaWali" placeholder="Nama Lengkap Orang Tua/Wali" value="<?= old('namaWali');?>" required>
            </div>
            <div class="col-md-4">
              <label>Alamat Wali</label>
            </div>
            <div class="col-md-8 form-group">
              <input type="text" id="alamatWali" class="form-control" name="alamatWali" placeholder="Alamat Lengkap Orang Tua/Wali" value="<?= old('alamatWali');?>" required>
            </div>
            <div class="col-md-4">
              <label>Nomor Kontak Orang Tua/Wali</label>
            </div>
            <div class="col-md-8 form-group">
              <input type="number" id="kontakWali" class="form-control" name="kontakWali" placeholder="Nomor Kontak Orang Tua/Wali Yang Dapat dihubungi" value="<?= old('kontakWali');?>" required>
            </div>
            <div class="col-md-4">
              <label>Agama Orang Tua/Wali</label>
            </div>
            <div class="col-md-8 form-group">
              <select class="form-select" aria-label="Default select example" required name="agamaWali" id="agamaWali" value="<?= old('agamaWali');?>">
                <option selected>
                  <-Pilih Agama Orang Tua/Wali->
                  </option>
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
                <select class="form-select" aria-label="Default select example" required name="pekerjaanWali" id="pekerjaanWali" value="<?= old('pekerjaanWali');?>">
                  <option selected>
                    <-Pilih Pekerjaan Orang Tua/Wali->
                    </option>
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
                  <select class="form-select" aria-label="Default select example" required name="pendapatanWali" id="pendapatanWali" value="<?= old('pendaptanWali');?>">
                    <option selected>
                      <-Pilih Pendaptan Bulanan Orang Tua/Wali->
                      </option>
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