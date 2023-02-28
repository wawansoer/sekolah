<?= $this->extend('tatausaha/layout') ?>
<?= $this->section('content') ?>
<div class="row">
  <h5 class="text-center"> Ubah Data Guru/Tenaga Pendidik </h5> 
  <hr>
  <?php if (!empty(session()->getFlashdata('error'))) : ?>
  <div class="alert alert-danger">
    <h4 class="alert-heading">Silahkan Periksa Entrian Form</h4>
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
  <form action="<?= base_url('tatausaha/prosesubahguru/'.$id_guru) ;?>" method="post" accept-charset="utf-10" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="jabatan" value="<?= ($jabatan) == "Guru" ? "1" : "2";?>">
    
    <div class="form-group row">
      <label class="col-md-2">Nama</label>
      <div class="col-md-10">
        <input type="text" name="nama" class="form-control" required value="<?= $nama;?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">NIK / NIP</label>
      <div class="col-md-5">
        <input type="number" name="nik" class="form-control" required value="<?= $nik;?>" >
        <small class="text-secondary">Nomor Induk Kependudukan</small>
      </div>
      <div class="col-md-5">
        <input type="number" name="nip" class="form-control" required value="<?= $nip;?>">
        <small class="text-secondary">Nomor Induk Pegawai</small>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Tempat / Tanggal Lahir</label>
      <div class="col-md-5">
        <input type="text" name="tempat_lahir" class="form-control" required value="<?= $tempat_lahir;?>"> 
        <small class="text-secondary">Tempat Lahir</small>
      </div>
      <div class="col-md-5">
        <input type="date" name="tanggal_lahir" class="form-control" required value="<?= $tanggal_lahir;?>">
        <small class="text-secondary">Tanggal Lahir</small>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Jenis Kelamin</label>
      <div class="col-md-10">
        <select name="jenis_kelamin" class="form-control" required>
          <option value="1" <?= ($jenis_kelamin) == "Laki-Laki" ? "selected" : "";?> >Laki-Laki</option>
          <option value="2" <?= ($jenis_kelamin) == "2" ? "selected" : "";?> >Perempuan</option> 
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Agama</label>
      <div class="col-md-10">
        <select name="agama" class="form-control" required>
          <option <?= ($agama) == "" ? "selected" : ""; ?> > -- Pilih Agama -- </option>
          <option value="Islam" <?= ($agama) == "Islam" ? "selected" : ""; ?>>Islam</option>
          <option value="Protestan" <?= ($agama) == "Protestan" ? "selected" : ""; ?>>Protestan</option>
          <option value="Katolik" <?= ($agama) == "Katolik" ? "selected" : ""; ?>>Katolik</option>
          <option value="Hindu" <?= ($agama) == "Hindu" ? "selected" : ""; ?>>Hindu</option>
          <option value="Budhha" <?= ($agama) == "Budhha" ? "selected" : ""; ?>>Budhha</option>
          <option value="Khonghucu" <?= ($agama) == "Khonghucu" ? "selected" : ""; ?>>Khonghucu</option>      
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Pendidikan Terakhir</label>
      <div class="col-md-10">
        <select name="pendidikan" class="form-control" required>
          <option value="1" <?= ($pendidikan) == "1" ? "selected" : "";?> >SMP</option>
          <option value="2" <?= ($pendidikan) == "2" ? "selected" : "";?> >SMA</option>
          <option value="3" <?= ($pendidikan) == "3" ? "selected" : "";?> >Sarjana</option> 
          <option value="4" <?= ($pendidikan) == "4" ? "selected" : "";?> >Magister</option>
          <option value="5" <?= ($pendidikan) == "5" ? "selected" : "";?> >Doktor</option>
        </select>
      </div>
    </div>

    <?php if ($jabatan === "Guru") { ?>
      <div class="form-group row">
      <label class="col-md-2">Status / Mata Pelajaran</label>
      <div class="col-md-5">
        <select name="status" class="form-control" required>
          <option value="1" <?= $status == "1" ? "selected" : "";?> >PNS</option>
          <option value="2" <?= $status == "2" ? "selected" : "";?> >Honorer</option>
        </select>
        <small class="text-secondary">Status Kepegawaian</small>
      </div>
      <div class="col-md-5">
        <select name="mapel" class="form-control" required>
          <?php foreach($mapel as $detMapel):?>
            <option value="<?= $detMapel->nama_mapel;?>" <?= $mapel == "<?= $detMapel->nama_mapel;?>" ? "selected" : "";?> ><?= $detMapel->nama_mapel;?></option>
          <?php endforeach;?>
        </select>
        <small class="text-secondary">Bidang Mata Pelajaran</small>
      </div>
    </div>

    <?php }else{ ?>

    <div class="form-group row">
      <label class="col-md-2">Status Kepegawaian</label>
      <div class="col-md-10">
        <select name="status" class="form-control" required>
          <option value="1" <?= ($status) == "1" ? "selected" : "";?> >PNS</option>
          <option value="2" <?= ($status) == "2" ? "selected" : "";?> >Honorer</option>
        </select>
      </div>
    </div>

    <?php } ?>
    

    <div class="form-group row">
      <label class="col-md-2">Alamat </label>
      <div class="col-md-10">
        <textarea name="alamat" id="alamat" class="form-control" rows="2"><?= $alamat ;?></textarea>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Kode Pos</label>
      <div class="col-md-10">
        <input type="number" name="pos" class="form-control" required value="<?= $pos ;?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Nomor Kontak</label>
      <div class="col-md-10">
        <input type="number" name="kontak" class="form-control" required value="<?= $kontak ;?>">
        <small class="text-secondary">contoh 6281XXXXXX</small>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2">Foto</label>
      <div class="col-md-10">
        <input type="file" name="foto" class="form-control">
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