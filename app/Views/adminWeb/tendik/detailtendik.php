<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<img class="img w-80 rounded-3 rounded mx-auto d-block" src="<?= base_url('assets/upload/image/'.$foto);?>" width="250em">
			</div>
			<h3 class="text-center"><?= $nama;?></h3>
			<h5 class="text-center">
				<?php 
				$x = 1;
				while($x <= $prioritas){
					echo "&#11088;";
					$x++;
				}
				?> 
			</h5>

			<h3 class="text-center">
				<a href="https://www.instagram.com/<?= $instagram;?>/">
					<i class="fab fa-instagram"></i>
				</a>
				&nbsp;&nbsp
				<a href="https://www.facebook.com/<?= $facebook;?>">
					<i class="fab fa-facebook"></i>
				</a>
				&nbsp;&nbsp
			</h3>
			

		</div>
		<div class="card-footer d-flex justify-content-center">
			<a href="<?= base_url('/adminWeb/tendik'); ?>">
				<button class="btn btn-primary" >
					<i class="bi bi-arrow-left-square-fill"></i> Kembali
				</button>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?= base_url('/adminWeb/ubahtendik/'.$idTendik); ?>">
				<button class="btn btn-success">
					<i class="bi bi-pencil-square"></i> Ubah
				</button>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?= base_url('/adminWeb/hapustendik/'.$idTendik); ?>">
				<button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Tenaga Pendidik?')">
					<i class="bi bi-trash-fill"></i> Hapus
				</button>
			</a>
		</div>
	</div>
</div>
<?= $this->endSection() ?>