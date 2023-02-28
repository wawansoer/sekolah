<?= $this->extend('kurikulum/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<h4 class="text-center"> Ubah Data Pengumuman </h4>
	<hr>
	<?php if (!empty(session()->getFlashdata('error'))) : ?>
		<div class="alert alert-light-danger">
			<h4 class="alert-heading">Silahkan Periksa Entrian Form</h4>
			<?php echo session()->getFlashdata('error'); ?>
		</div>
	<?php endif; ?>

</div>
<div class="row">
	<form action="<?= base_url('kurikulum/prosesubahpengumuman/' . $id_pengumuman) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="form-group row">
			<label class="col-md-3">Nama Pengumuman</label>
			<div class="col-md-9">
				<input type="text" name="pengumuman" class="form-control" required value="<?= $pengumuman; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3">Unggah Gambar Pengumuman</label>
			<div class="col-md-9">
				<input type="file" name="gambar" class="form-control">
				<small class="text-secondary">Maksimal 1024 Kb, Dengan Ekstensi PNG, JPG, JPEG, atau GIF</small>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3">Unggah Berkas Pengumuman</label>
			<div class="col-md-9">
				<input type="file" name="berkas" class="form-control">
				<small class="text-secondary">Maksimal 1024 Kb, Dengan Ekstensi PDF</small>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3">Deskripsi Pengumuman</label>
			<div class="col-md-9">
				<textarea name="deskripsi" id="deskripsi" class="form-control" rows="15"><?= $deskripsi; ?></textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3">Keyword Pengumuman (untuk SEO Google)</label>
			<div class="col-md-9">
				<textarea name="keyword" class="form-control" required><?= $keyword; ?> </textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3"></label>
			<div class="col-md-9">
				<button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i> Simpan</button>
			</div>
		</div>
	</form>
</div>

<script src="<?= base_url('assets/vendors/tinymce/tinymce.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/tinymce/plugins/code/plugin.min.js'); ?>"></script>
<script>
	tinymce.init({
		selector: '#deskripsi'
	});
</script>

<?= $this->endSection() ?>