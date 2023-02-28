<?= $this->extend('kurikulum/layout') ?>
<?= $this->section('content') ?>

<div class="row" align="center">
	<div class="col-lg-6 col-md-12 mb-3">
		<a href="<?= base_url('kurikulum/tambahsiswa');?>">
			<div class="d-grid gap-2">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-plus-square"></i>
					Tambah Siswa
				</button>
			</div> 
		</a>
	</div>

	<div class="col-lg-6 col-md-12 mb-3">
		<a href="<?= base_url('kurikulum/tambahsiswacsv');?>">
			<div class="d-grid gap-2">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-folder-plus"></i>
					Tambah Siswa Dari CSV
				</button>
			</div> 
		</a>
	</div>

</div>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4> Daftar siswa </h4>
		</div>
		<div class="card-body">
			<?php if (!empty(session()->getFlashdata('message'))) : ?>
			<div class="alert alert-success" role="alert">
				<strong>Selamat ! </strong> <?php echo session()->getFlashdata('message'); ?>
			</div>
		<?php endif; ?>
		<table class="table table-striped" id="siswa">
			<thead>
				<tr>
					<th>Nis</th>
					<th>Judul</th>
					<th>Status</th>
					<th>Kategori</th>
					<th>Editor</th>
					<th>Prioritas</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</div>
</div>
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js');?>"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#siswa');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>