<?= $this->extend('kurikulum/layout') ?>
<?= $this->section('content') ?>

<div class="row" align="center">
	<div class="col-lg-12 col-md-12 mb-3">
		<a href="<?= base_url('kurikulum/tambahpengumuman'); ?>">
			<div class="d-grid gap-2">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-plus-square"></i>
					Tambah Berkas/Pengumuman
				</button>
			</div>
		</a>
	</div>
</div>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4> Daftar Berkas/Pengumuman </h4>
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
						<th>#</th>
						<th class="text-center">Berkas/Pengumuman</th>
						<th class="text-center">Deskripsi</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$x = 1;
					foreach ($pengumuman as $det) :
					?>
						<tr>
							<td> <?= $x; ?> </td>
							<td> <?= $det->pengumuman; ?> </td>
							<td> <?= $det->deskripsi; ?> </td>
							<td class="text-center">


								<a href="<?= base_url('/kurikulum/detailpengumuman/' . $det->id_pengumuman); ?>">
									<button class="btn btn-success btn-sm">
										<i class="fas fa-eye"></i> Detail
									</button>
								</a>
								&nbsp; &nbsp;
								<a href="<?= base_url('/kurikulum/ubahpengumuman/' . $det->id_pengumuman); ?>">
									<button class="btn btn-primary btn-sm">
										<i class="fas fa-edit"></i> Ubah
									</button>
								</a>

								&nbsp; &nbsp;

								<a href="<?= base_url('/kurikulum/hapuspengumuman/' . $det->id_pengumuman); ?>">
									<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $det->pengumuman; ?> ?')">
										<i class="fas fa-trash-alt"></i> Hapus
									</button>
								</a>

							</td>
						</tr>

					<?php
						$x = $x + 1;
					endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
<script>
	// Simple Datatable
	let table1 = document.querySelector('#siswa');
	let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>