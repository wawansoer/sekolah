<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>

<div class="row" align="center">
	<div class="col-12 col-lg-12 col-md-12 mb-3">
		<a href="<?= base_url('adminWeb/tambahsarpras');?>">
			<div class="d-grid gap-2">
				<button class="btn btn-primary" type="button">
					<i class="bi bi-plus-square-fill"></i>  Sarana & Prasarana
				</button>
			</div> 
		</a>
	</div>
</div>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4> Daftar Sarana & Prasarana </h4>
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
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php  foreach ($sarpras as $det) :?>
					<tr>
						<td> 
							<img src="<?= base_url('assets/upload/image/'.$det->foto);?>" width="100em">
						</td>
						<td> <?= $det->nama;?> </td>
						<td>
							<a href="<?= base_url('/adminWeb/ubahsarpras/'.$det->idSarpras); ?>">
								<span class="badge bg-success">
									<i class="bi bi-trash-fill"></i> Ubah
								</span>
							</a>
							&nbsp;&nbsp

							<a href="<?= base_url('/adminWeb/hapussarpras/'.$det->idSarpras); ?>">
								<span class="badge bg-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Data Sarana & Prasarana ?')">
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