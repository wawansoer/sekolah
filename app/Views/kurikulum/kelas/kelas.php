<?= $this->extend('kurikulum/layout') ?>
<?= $this->section('content') ?>

<div class="row" align="center">
	<div class="col-lg-12 col-md-12 mb-3">
		<a href="<?= base_url('kurikulum/tambahkelas');?>">
			<div class="d-grid gap-2">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-plus-square"></i>
					Tambah Kelas
				</button>
			</div> 
		</a>
	</div>
</div>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4> Daftar Kelas </h4>
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
					<th class="text-center">Nama Kelas</th>
					<th class="text-center">Deskripsi Kelas</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$x = 1;  
				foreach ($kelas as $det) :
					?>
					<tr>
						<td> <?= $x;?> </td>
						<td> <?= $det->nama_kelas;?> </td>
						<td> <?= $det->deskripsi_kelas;?> </td>
						<td class="text-center">
							
							<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-backdrop="false" data-bs-target="#a<?= $det->id_kelas;?>">
								<i class="fas fa-edit"></i> Ubah
							</button>
							&nbsp; &nbsp;

							<!-- modal form ubah kelas -->
							<div class="modal fade text-left" id="a<?= $det->id_kelas;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<form action="<?= base_url('kurikulum/prosesubahkelas/' .$det->id_kelas);?>" method="post" accept-charset="utf-8">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel4">Ubah Data Kelas</h4>
												<button type="button" class="close" data-bs-dismiss="modal"
												aria-label="Close">
												<i class="fas fa-times"></i>
											</button>
										</div>
										<div class="modal-body">
											<div class="form-group row">
												<label class="col-md-4">Nama Kelas</label>
												<div class="col-md-8">
													<input type="text" name="nama_kelas" class="form-control" required value="<?= $det->nama_kelas;?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4">Deskripsi Kelas</label>
												<div class="col-md-8">
													<input type="text" name="deskripsi_kelas" class="form-control" required value="<?= $det->deskripsi_kelas;?>">
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-light-secondary"
											data-bs-dismiss="modal">
											<i class="bx bx-x d-block d-sm-none"></i>Tutup</span>
										</button>
										<button type="submit" class="btn btn-success">Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</form>

					<a href="<?= base_url('/kurikulum/hapuskelas/'.$det->id_kelas); ?>">
						<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas <?= $det->nama_kelas;?> ?')">
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
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js');?>"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#siswa');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>


