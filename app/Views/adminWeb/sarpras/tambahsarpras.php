<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<h5 class="text-center">  Tambah Data Sarana & Prasarana </h5>
	<hr>
	<?php if (!empty(session()->getFlashdata('error'))) : ?>
	<div class="alert alert-light-danger">
		<h4 class="alert-heading">Silahkan Periksa Entrian Form</h4>
		<?php echo session()->getFlashdata('error'); ?>
	</div>
<?php endif; ?>
	
</div>
<div class="row">
	<form action="<?= base_url('adminWeb/prosestambahsarpras') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="form-group row">
			<label class="col-md-2">Nama </label>
			<div class="col-md-10">
				<input type="text" name="nama" class="form-control" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2">Foto</label>
			<div class="col-md-10">
				<input type="file" name="foto" class="form-control">
				<small class="text-secondary">Maksimal 1024 Kb, Dengan Ekstensi PNG, JPG, JPEG, atau GIF</small>
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

<script src="<?= base_url('assets/vendors/tinymce/tinymce.min.js');?>"></script>
<script src="<?= base_url('assets/vendors/tinymce/plugins/code/plugin.min.js');?>"></script>
<script>
	tinymce.init({ selector: '#isi' });
</script>

<?= $this->endSection() ?>