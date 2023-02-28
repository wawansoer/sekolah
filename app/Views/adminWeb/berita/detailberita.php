<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<img class="img-fluid w-80 rounded-3 rounded mx-auto d-block" src="<?= base_url('assets/upload/image/'.$gambar);?>">
			</div>
			
			
			<br>
			<small>
				<?= $username;?> | 
				<?= tgl_indo($tanggal_post);?> |
				<?= $stat;?> |
				<?php 
				$x = 0;
				while($x <= $prioritas){
					echo "&#11088;";
					$x++;
				}
				?> 
			</small>
			<hr>
			<h3 class="card-title text-center"><?= $judul_berita;?></h3>
			<p class="card-text">
				<?= $isi;?>
			</p>

		</div>
		<div class="card-footer d-flex justify-content-center">
			<a href="<?= base_url('/adminWeb/berita'); ?>">
				<button class="btn btn-primary" >
					<i class="bi bi-arrow-left-square-fill"></i> Kembali
				</button>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?= base_url('/adminWeb/ubahberita/'.$slug_judul); ?>">
				<button class="btn btn-success">
					<i class="bi bi-pencil-square"></i> Ubah
				</button>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?= base_url('/adminWeb/hapusberita/'.$slug_judul); ?>">
				<button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ?')">
					<i class="bi bi-trash-fill"></i> Hapus
				</button>
			</a>
		</div>
	</div>
</div>
<?= $this->endSection() ?>