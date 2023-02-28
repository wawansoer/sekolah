<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>

<div class="row" align="center">
	<div class="col-12 col-lg-12 col-md-12 mb-3">
		<a href="<?= base_url('adminWeb/tambahtendik');?>">
			<div class="d-grid gap-2">
				<button class="btn btn-primary" type="button">
					<i class="bi bi-plus-square-fill"></i>  Data Tenaga Pendidik
				</button>
			</div> 
		</a>
	</div>
</div>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4> Daftar Tenaga Pendidik </h4>
		</div>
		<div class="card-body">
			<?php if (!empty(session()->getFlashdata('message'))) : ?>
			<div class="alert alert-success" role="alert">
				<strong>Selamat ! </strong> <?php echo session()->getFlashdata('message'); ?>
			</div>
		<?php endif; ?>
		<table class="table table-striped" id="berita">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Nama</th>
					<th>Prioritas</th>
					<th>Sosial Media</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php  foreach ($tendik as $det) :?>
					<tr>
						<td> 
							<img src="<?= base_url('assets/upload/image/'.$det->foto);?>" width="100em">
						</td>
						<td> <?= $det->nama;?> </td>
						<td> 
							<?php 
							$x = 1;
							while($x <= $det->prioritas){
								echo "&#11088;";
								$x++;
							}
							?> 
						</td> 

						<td>
							<a href="https://www.instagram.com/<?= $det->instagram;?>/">
								<span class="badge bg-primary">
									<i class="fab fa-instagram"></i>
								</span>
							</a>
							&nbsp;&nbsp
							<a href="https://www.facebook.com/<?= $det->facebook;?>">
								<span class="badge bg-primary">
									<i class="fab fa-facebook"></i>
								</span>
							</a>
							&nbsp;&nbsp
						</td>
						<td>
							<a href="<?= base_url('/adminWeb/detailtendik/'.$det->idTendik); ?>">
								<span class="badge bg-success">
									<i class="bi bi-eye-fill"></i> Detail
								</span>
							</a>
							&nbsp;&nbsp
							<a href="<?= base_url('/adminWeb/ubahtendik/'.$det->idTendik); ?>">
								<span class="badge bg-warning">
									<i class="bi bi-trash-fill"></i> Ubah
								</span>
							</a>
							&nbsp;&nbsp

							<a href="<?= base_url('/adminWeb/hapustendik/'.$det->idTendik); ?>">
								<span class="badge bg-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ?')">
									<i class="bi bi-trash-fill"></i> Hapus
								</span>
							</a>


						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js');?>"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#berita');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>