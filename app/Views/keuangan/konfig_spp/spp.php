<?= $this->extend('keuangan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="card">
		<div class="card-header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-lg-6 ">
						<h4> Daftar Periode SPP </h4>
					</div>
					<div class="col-md-6 col-lg-6 text-end">
						<button type="button" class="btn-sm btn-primary bg-gradient" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
							<i class="fas fa-plus-square"></i>
							Tambah Periode SPP
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<?php if (!empty(session()->getFlashdata('error'))) : ?>
				<div class="alert alert-danger" role="alert">
					<strong>Mohon maaf ! </strong> <?php echo session()->getFlashdata('error'); ?>
					<p> Silahkan cek kembali inputan anda.</p>
				</div>
			<?php endif; ?>

			<?php if (!empty(session()->getFlashdata('message'))) : ?>
				<div class="alert alert-success" role="alert">
					<strong>Selamat ! </strong> <?php echo session()->getFlashdata('message'); ?>
				</div>
			<?php endif; ?>
			<table class="table table-striped" id="periode">
				<thead>
					<tr>
						<th class="text-center">Nama Periode</th>
						<th class="text-center">Jumlah Tagihan</th>
						<th class="text-center">Waktu Pembayaran</th>
						<th class="text-center">Keterangan</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($periode as $det) : ?>
						<tr>
							<td> <?= $det->namaPeriode; ?> </td>
							<td> <?= rp($det->jumlah); ?> </td>
							<td>
								<?= tgl_indo($det->awalPeriode); ?> s/d
								<?= tgl_indo($det->akhirPeriode); ?>
							</td>
							<td> <?= $det->keterangan; ?> </td>
							<td class="text-center">
								<button class="btn btn-success btn-sm mt-1 mb-1 bg-gradient" data-bs-toggle="modal" data-bs-backdrop="false" data-bs-target="#a<?= $det->idPeriode; ?>">
									<i class="fas fa-edit"></i> Ubah
								</button>

								<!-- modal form ubah periodespp -->
								<div class="modal fade text-left" id="a<?= $det->idPeriode; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<form action="<?= base_url('keuangan/prosesubahperiodespp/' . $det->idPeriode) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
												<?= csrf_field(); ?>
												<div class="modal-header">
													<h5 class="modal-title" id="staticBackdropLabel">Ubah Periode SPP</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body text-start">
													<div class="row mb-3">
														<label for="namaPeriode" class="col-sm-4 col-form-label">Nama Periode</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="namaPeriode" name="namaPeriode" required value="<?= $det->namaPeriode; ?>">
														</div>
													</div>

													<div class="row mb-3">
														<label for="awalPeriode" class="col-sm-4 col-form-label">Awal Waktu Bayar</label>
														<div class="col-sm-8">
															<input type="date" class="form-control" id="awalPeriode" name="awalPeriode" required value="<?= $det->awalPeriode; ?>">
														</div>
													</div>

													<div class="row mb-3">
														<label for="akhirPeriode" class="col-sm-4 col-form-label">Akhir Waktu Bayar</label>
														<div class="col-sm-8">
															<input type="date" class="form-control" id="akhirPeriode" name="akhirPeriode" required value="<?= $det->akhirPeriode; ?>">
														</div>
													</div>

													<div class="row mb-3">
														<label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
														<div class="col-sm-8">
															<input type="number" class="form-control" id="jumlah" name="jumlah" required value="<?= $det->jumlah; ?>">
														</div>
													</div>

													<div class="row mb-3">
														<label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= $det->keterangan; ?>">
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
								</form>
								<a href="<?= base_url('/keuangan/hapusperiodespp/' . $det->idPeriode); ?>">
									<button class="btn btn-danger btn-sm mt-1 mb-1 bg-gradient" onclick="return confirm('Apakah Anda yakin ingin menghapus periodespp <?= $det->namaPeriode; ?> ?')">
										<i class="fas fa-trash-alt"></i> Hapus
									</button>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Form tambah berkas -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('keuangan/prosestambahperiodespp') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Tambah Periode SPP</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-start">
					<div class="row mb-3">
						<label for="namaPeriode" class="col-sm-4 col-form-label">Nama Periode</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="namaPeriode" name="namaPeriode" required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="awalPeriode" class="col-sm-4 col-form-label">Awal Waktu Bayar</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" id="awalPeriode" name="awalPeriode" required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="akhirPeriode" class="col-sm-4 col-form-label">Akhir Waktu Bayar</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" id="akhirPeriode" name="akhirPeriode" required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="jumlah" name="jumlah" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
<script>
	// Simple Datatable
	let table1 = document.querySelector('#periode');
	let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>