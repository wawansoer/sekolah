<?= $this->extend('tatausaha/layout') ?>
<?= $this->section('content') ?>
<div class="row">
  <h5 class="text-center"> Tambah Data Tenaga Pendidik </h5> 
  <hr>
  <?php if (!empty(session()->getFlashdata('error'))) : ?>
  <div class="alert alert-danger">
    <h2 class="alert-heading">Silahkan Periksa Entrian Form</h2>
    <?php echo session()->getFlashdata('error'); ?>
  </div>
<?php endif; ?>

<?php if (!empty(session()->getFlashdata('message'))) : ?>
<div class="alert alert-success">
  <h2 class="alert-heading">Selamat !</h2>
  <?php echo session()->getFlashdata('message'); ?>
</div>
<?php endif; ?>

</div>
<div class="row">
  <form action="<?= base_url('tatausaha/prosestambahguru') ?>" method="post" accept-charset="utf-10" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="jabatan" value="2">
    
    <div class="form-group row">
      <label class="col-md-2">Nama</label>
      <div class="col-md-10">
        <input type="text" name="nama" class="form-control" required value="<?= old('nama');?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">NIK / NIP</label>
      <div class="col-md-5">
        <input type="number" name="nik" class="form-control" required value="<?= old('nik');?>" >
        <small class="text-secondary">Nomor Induk Kependudukan</small>
      </div>
      <div class="col-md-5">
        <input type="number" name="nip" class="form-control" required value="<?= old('nip');?>">
        <small class="text-secondary">Nomor Induk Pegawai</small>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Tempat / Tanggal Lahir</label>
      <div class="col-md-5">
        <input type="text" name="tempat_lahir" class="form-control" required value="<?= old('tempat_lahir');?>"> 
        <small class="text-secondary">Tempat Lahir</small>
      </div>
      <div class="col-md-5">
        <input type="date" name="tanggal_lahir" class="form-control" required value="<?= old('tanggal_lahir');?>">
        <small class="text-secondary">Tanggal Lahir</small>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Jenis Kelamin</label>
      <div class="col-md-10">
        <select name="jenis_kelamin" class="form-control" required>
          <option <?= (old('jenis_kelamin') == "" ? "selected" : "");?> > -- Pilih Jenis Kelamin -- </option>
          <option value="1" <?= (old('jenis_kelamin') == "1" ? "selected" : "");?> >Laki-Laki</option>
          <option value="2" <?= (old('jenis_kelamin') == "2" ? "selected" : "");?> >Perempuan</option> 
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Agama</label>
      <div class="col-md-10">
        <select name="agama" class="form-control" required>
          <option <?= (old('agama') == "" ? "selected" : ""); ?> > -- Pilih Agama -- </option>
          <option value="Islam" <?= (old('agama') == "Islam" ? "selected" : ""); ?>>Islam</option>
          <option value="Protestan" <?= (old('agama') == "Protestan" ? "selected" : ""); ?>>Protestan</option>
          <option value="Katolik" <?= (old('agama') == "Katolik" ? "selected" : ""); ?>>Katolik</option>
          <option value="Hindu" <?= (old('agama') == "Hindu" ? "selected" : ""); ?>>Hindu</option>
          <option value="Budhha" <?= (old('agama') == "Budhha" ? "selected" : ""); ?>>Budhha</option>
          <option value="Khonghucu" <?= (old('agama') == "Khonghucu" ? "selected" : ""); ?>>Khonghucu</option>      
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Pendidikan Terakhir</label>
      <div class="col-md-10">
        <select name="pendidikan" class="form-control" required>
          <option <?= (old('pendidikan') == "" ? "selected" : "");?> > -- Pilih Pendidikan -- </option>
          <option value="1" <?= (old('pendidikan') == "1" ? "selected" : "");?> >SMP</option>
          <option value="2" <?= (old('pendidikan') == "2" ? "selected" : "");?> >SMA</option>
          <option value="3" <?= (old('pendidikan') == "3" ? "selected" : "");?> >Sarjana</option> 
          <option value="4" <?= (old('pendidikan') == "4" ? "selected" : "");?> >Magister</option>
          <option value="5" <?= (old('pendidikan') == "5" ? "selected" : "");?> >Doktor</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Status Kepegawaian</label>
      <div class="col-md-10">
        <select name="status" class="form-control" required>
          <option value="<?= (old('status') == "" ? "selected" : "");?> "> -- Pilih status -- </option>
          <option value="1" <?= (old('status') == "1" ? "selected" : "");?> >PNS</option>
          <option value="2" <?= (old('status') == "2" ? "selected" : "");?> >Honorer</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Alamat </label>
      <div class="col-md-10">
        <textarea name="alamat" id="alamat" class="form-control" rows="2"><?= old('alamat');?></textarea>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Kode Pos</label>
      <div class="col-md-10">
        <input type="number" name="pos" class="form-control" required value="<?= old('pos');?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Nomor Kontak</label>
      <div class="col-md-10">
        <input type="number" name="kontak" class="form-control" required value="<?= old('kontak');?>">
        <small class="text-secondary">contoh 6281XXXXXX</small>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Foto</label>
      <div class="col-md-10">
        <input type="file" name="foto" class="form-control" required>
        <small class="text-secondary">Maksimal 512 Kb, Dengan Ekstensi PNG, JPG, JPEG, atau GIF</small>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2"></label>
      <div class="col-md-10">
        <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i> Simpan</button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>