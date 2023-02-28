<?= $this->extend('kesiswaan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <h5 class="text-center"> Ubah Data Siswa </h5>
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
    <form action="<?= base_url('kesiswaan/prosesubahsiswa/' . $idSiswa) ?>" method="post" accept-charset="utf-10" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label class="col-md-2">Nama/Status</label>
            <div class="col-md-5">
                <input type="text" name="nama" class="form-control" required value="<?= $nama; ?>">
                <small class="text-secondary">Nama Lengkap</small>
            </div>
            <div class="col-md-5">
                <select name="status" class="form-control" required>
                    <option value="Aktif" <?= ($status == "Aktif" ? "selected" : ""); ?>>Aktif</option>
                    <option value="Tidak" <?= ($status == "Tidak" ? "selected" : ""); ?>>Tidak</option>
                </select>
                <small class="text-secondary">Status Siswa</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">NISN/NIS</label>
            <div class="col-md-5">
                <input type="number" name="nisn" class="form-control" required value="<?= $nisn; ?>">
                <small class="text-secondary">Nomor Induk Siswa Nasional</small>
            </div>
            <div class="col-md-5">
                <input type="number" name="nis" class="form-control" required value="<?= $nis; ?>">
                <small class="text-secondary">Nomor Induk Siswa</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Kelas/Angkatan</label>
            <div class="col-md-5">
                <select name="id_kelas" class="form-control" required>
                    <option value="" <?= ($id_kelas == "" ? "selected" : ""); ?>> -- Pilih Kelas -- </option>
                    <?php foreach ($kelas as $detKelas) : ?>
                        <option value="<?= $detKelas->id_kelas; ?>" <?= ($id_kelas == "$detKelas->id_kelas" ? "selected" : ""); ?>>
                            <?= $detKelas->nama_kelas; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <small class="text-secondary">Kelas</small>
            </div>
            <div class="col-md-5">
                <select name="angkatan" class="form-control" required>
                    <option value="" <?= (old('angkatan') == "" ? "selected" : ""); ?>> -- Pilih Angkatan -- </option>
                    <?php
                    $angkatan = date('Y');
                    $i = 0;
                    while ($i < 5) {
                        $angkatPlus = $angkatan + 1;
                        $cetak = $angkatan . "/" . $angkatPlus;
                    ?>
                        <option value="<?= $cetak; ?>" <?= ($angkatanDB == "$cetak" ? "selected" : ""); ?>><?= $cetak; ?></option>

                    <?php
                        $angkatan = $angkatan - 1;
                        $i++;
                    }
                    ?>
                </select>
            </div>

        </div>

        <div class="form-group row">
            <label class="col-md-2">Tempat dan Tanggal Lahir</label>
            <div class="col-md-5">
                <input type="text" name="tempat_lahir" class="form-control" required value="<?= $tempat_lahir; ?>">
                <small class="text-secondary">Tempat Lahir</small>
            </div>
            <div class="col-md-5">
                <input type="date" name="tanggal_lahir" class="form-control" required value="<?= $tanggal_lahir; ?>">
                <small class="text-secondary">Tanggal Lahir</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Jenis Kelamin</label>
            <div class="col-md-10">
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="1" <?= ($jenis_kelamin == "1" ? "selected" : ""); ?>>Laki-Laki</option>
                    <option value="2" <?= ($jenis_kelamin == "2" ? "selected" : ""); ?>>Perempuan</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Agama</label>
            <div class="col-md-10">
                <select name="agama" class="form-control" required>
                    <option value="Islam" <?= ($agama == "Islam" ? "selected" : ""); ?>>Islam</option>
                    <option value="Protestan" <?= ($agama == "Protestan" ? "selected" : ""); ?>>Protestan</option>
                    <option value="Katolik" <?= ($agama == "Katolik" ? "selected" : ""); ?>>Katolik</option>
                    <option value="Hindu" <?= ($agama == "Hindu" ? "selected" : ""); ?>>Hindu</option>
                    <option value="Budhha" <?= ($agama == "Budhha" ? "selected" : ""); ?>>Budhha</option>
                    <option value="Khonghucu" <?= ($agama == "Khonghucu" ? "selected" : ""); ?>>Khonghucu</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Alamat Domisili</label>
            <div class="col-md-10">
                <textarea name="alamat_domisili" id="alamat_domisili" class="form-control" rows="2"><?= $alamat_domisili; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Kode Pos Domisili</label>
            <div class="col-md-10">
                <input type="number" name="pos_domisili" class="form-control" required value="<?= $pos_domisili; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Nomor Kontak</label>
            <div class="col-md-10">
                <input type="number" name="kontak_siswa" class="form-control" required value="<?= $kontak_siswa; ?>">
                <small class="text-secondary">contoh 6281xxxxxxx</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Foto Siswa</label>
            <div class="col-md-10">
                <input type="file" name="foto" class="form-control">
                <small class="text-secondary">Maksimal 512 Kb, Dengan Ekstensi PNG, JPG, JPEG, atau GIF</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Nama Orang Tua</label>
            <div class="col-md-5">
                <input type="text" name="nama_bapak" class="form-control" required value="<?= $nama_bapak; ?>">
                <small class="text-secondary">Nama Ayah</small>
            </div>
            <div class="col-md-5">
                <input type="text" name="nama_ibu" class="form-control" required value="<?= $nama_ibu; ?>">
                <small class="text-secondary">Nama Ibu</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Alamat Orang Tua</label>
            <div class="col-md-10">
                <textarea name="alamat_ortu" id="alamat_ortu" class="form-control" rows="2"><?= $alamat_ortu; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Kode Pos Alamat Orang Tua</label>
            <div class="col-md-10">
                <input type="number" name="pos_orang_tua" class="form-control" required value="<?= $pos_orang_tua; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Kontak Orang Tua</label>
            <div class="col-md-10">
                <input type="number" name="kontak_orangtua" class="form-control" required value="<?= $kontak_orangtua; ?>">
                <small class="text-secondary">contoh 6281xxxxxxx</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Pendapatan Orang Tua</label>
            <div class="col-md-10">
                <select name="pendapatan_ortu" class="form-control" required>
                    <option value="1" <?= ($pendapatan_ortu == "1" ? "selected" : ""); ?>>Kurang Dari Rp 1.500.000 / Bulan</option>
                    <option value="2" <?= ($pendapatan_ortu == "2" ? "selected" : ""); ?>>Rp 1.500.000 s/d Rp 3.000.000 / Bulan </option>
                    <option value="3" <?= ($pendapatan_ortu == "3" ? "selected" : ""); ?>>Rp 3.000.000 s/d Rp 5.000.000 / Bulan </option>
                    <option value="4" <?= ($pendapatan_ortu == "4" ? "selected" : ""); ?>>Lebih Dari Rp 5.000.000 / Bulan</option>
                </select>
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