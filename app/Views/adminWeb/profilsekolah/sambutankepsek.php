<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<?php if (!empty(session()->getFlashdata('message'))) : ?>
	<div class="alert alert-success" role="alert">
		<strong>Selamat ! </strong> <?php echo session()->getFlashdata('message'); ?>
	</div>
	<?php endif; ?>
<div class="card">
	<div class="card-content">
		<div class="card-body">
			<img class="img w-40 rounded-3 rounded mx-auto d-block" src="<?= base_url('assets/upload/image/'.$foto);?>" width="300em">
			<p class="text-center"> <b> <?= $namakepsek;?> </b></p>
		</div>
		<hr>
		<h3 class="card-title text-center">Sambutan Kepala Sekolah</h3>
		<p class="card-text">
			<?= $isi;?>
		</p>

	</div>
	<div class="card-footer d-flex justify-content-center">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?= base_url('/adminWeb/ubahsambutan/'.$idkepsek); ?>">
			<button class="btn btn-success">
				<i class="bi bi-pencil-square"></i> Ubah
			</button>
		</a>
	</div>
</div>
</div>
<?= $this->endSection() ?>