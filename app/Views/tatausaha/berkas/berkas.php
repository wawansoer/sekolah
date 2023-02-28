<?= $this->extend('tatausaha/layout') ?>
<?= $this->section('content') ?>

<div class="row" align="center">
	<div class="col-lg-12 col-md-12 mb-3">
		<div class="d-grid gap-2">
			<!-- tombol modal tambah berkas-->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				<i class="fas fa-plus-square"></i>
				Tambah berkas
			</button>
		</div>

		<!-- Modal Form tambah berkas -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?= base_url('tatausaha/prosestambahberkas') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
						<?= csrf_field(); ?>
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Tambah Data Berkas</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row mb-3">
								<label for="namaBerkas" class="col-sm-3 col-form-label">Nama Berkas</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="namaBerkas" name="namaBerkas" required>
								</div>
							</div>
							<div class="row mb-3">
								<label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
								<div class="col-sm-9">
									<textarea name="ket" id="ket" class="form-control" rows="4" required></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4> Daftar berkas </h4>
		</div>
		<div class="card-body">
			<?php if (!empty(session()->getFlashdata('message'))) : ?>
				<div class="alert alert-success" role="alert">
					<strong>Selamat ! </strong> <?php echo session()->getFlashdata('message'); ?>
				</div>
			<?php endif; ?>

			<?php if (!empty(session()->getFlashdata('error'))) : ?>
				<div class="alert alert-danger">
					<h5 class="alert-heading">Silahkan Periksa Entrian Form</h5>
					<?php echo session()->getFlashdata('error'); ?>
				</div>
			<?php endif; ?>
			<table class="table table-striped" id="berkas">
				<thead>
					<tr>
						<th>#</th>
						<th class="text-center">Nama Berkas</th>
						<th class="text-center">Keterangan</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$x = 1;
					foreach ($berkas as $det) :
					?>
						<tr>
							<td> <?= $x; ?> </td>
							<td> <?= $det->namaBerkas; ?> </td>
							<td> <?= $det->ket; ?> </td>
							<td class="text-center">
								<!-- tombol modal ubah berkas -->
								<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubah<?= $det->idBerkas; ?>">
									<i class="fas fa-edit"></i>
									Ubah
								</button>


								<!-- Modal form Ubah data berkas-->
								<div class="modal fade" id="ubah<?= $det->idBerkas; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

											<form action="<?= base_url('/tatausaha/prosesubahberkas/' . $det->idBerkas); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
												<?= csrf_field(); ?>
												<div class="modal-header">
													<h5 class="modal-title" id="staticBackdropLabel">Ubah Data Berkas</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="row mb-3">
														<label for="namaBerkas" class="col-sm-3 col-form-label">Nama Berkas</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" id="namaBerkas" name="namaBerkas" value="<?= $det->namaBerkas; ?>">
														</div>
													</div>
													<div class="row mb-3">
														<label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
														<div class="col-sm-9">
															<textarea name="ket" id="ket" class="form-control" rows="4"><?= $det->ket; ?></textarea>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-success">Simpan</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<a href="<?= base_url('/tatausaha/hapusberkas/' . $det->idBerkas); ?>">
									<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berkas <?= $det->namaBerkas; ?> ?')">
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
	let table1 = document.querySelector('#berkas');
	let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>