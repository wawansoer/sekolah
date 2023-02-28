<?= $this->extend('kurikulum/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<h4 class="text-center"> Tambah Kelas </h4>
	<hr> 
	<?php if (!empty(session()->getFlashdata('error'))) : ?>
	<div class="alert alert-light-danger">
		<h4 class="alert-heading">Silahkan Periksa Entrian Form</h4>
		<?php echo session()->getFlashdata('error'); ?>
	</div>
<?php endif; ?>

<?php if (!empty(session()->getFlashdata('message'))) : ?>
<div class="alert alert-light-success">
	<h4 class="alert-heading">Selamat !</h4>
	<?php echo session()->getFlashdata('message'); ?>
</div>
<?php endif; ?>

</div>
<div class="row">
	<form action="<?= base_url('kurikulum/prosestambahkelas') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="form-group row">
			<label class="col-md-2">Nama Kelas</label>
			<div class="col-md-10">
				<input type="text" name="nama_kelas" class="form-control" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2">Deskripsi Kelas</label>
			<div class="col-md-10">
				<input type="text" name="deskripsi_kelas" class="form-control" required>
			</div>
		</div>
		
		<div class="form-group row">
			<label class="col-md-2"></label>
			<div class="col-md-10">
				<button type="submit" class="btn btn-success"> <i class="fas fa-save"></i>  Simpan</button>
			</div>
		</div>
	</form>
</div>


<?= $this->endSection() ?>