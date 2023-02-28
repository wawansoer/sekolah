<?= $this->extend('tatausaha/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<img class="img-fluid rounded-2 rounded mx-auto d-block" src="<?= base_url('assets/upload/guru/'.$foto);?>">
						</div>
						<div class="col-md-6">
							<table class="table table-borderless">
								<tr>
									<td> Nama </td>
									<td> : </td>
									<td> <?= $nama;?> </td>
								</tr>
								<tr>
									<td> NIK </td>
									<td> : </td>
									<td> <?= $nik;?></td>
								</tr>
								<tr>
									<td> NIP </td>
									<td> : </td>
									<td> <?= $nip;?></td>
								</tr>
								<tr>
									<td> Jenis Kelamin </td>
									<td> : </td>
									<td> <?= $jenis_kelamin;?></td>
								</tr>
								<tr>
									<td> Tempat, Tanggal Lahir </td>
									<td> : </td>
									<td> <?= $tempat_lahir;?>, <?= tgl_indo($tanggal_lahir);?></td>
								</tr>
								<tr>
									<td> Agama </td>
									<td> : </td>
									<td> <?= $agama;?></td>
								</tr>
								<tr>
									<td> Pendidikan </td>
									<td> : </td>
									<td> <?= $pendidikan;?></td>
								</tr>
								<tr>
									<td> Alamat </td>
									<td> : </td>
									<td> <?= $alamat;?> Kode Pos <?= $pos;?></td>
								</tr>
								<tr>
									<td> Nomor Kontak </td>
									<td> : </td>
									<td> <?= $kontak;?></td>
								</tr>
								<tr>
									<td> Jabatan </td>
									<td> : </td>
									<td> <?= $jabatan;?></td>
								</tr>
								<?= ($jabatan == "Guru" ?  
									"<tr> 
										<td> Mata Pelajaran </td> 
										<td> : </td> 
										<td>". $mapel ."</td>
									</tr>"
									: "");
								?>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="card-footer d-flex justify-content-center">
			<a href="<?= base_url('/tatausaha/guru'); ?>">
				<button class="btn btn-primary" >
					<i class="bi bi-arrow-left-square-fill"></i> Kembali
				</button>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?= base_url('/tatausaha/ubahguru/'.$id_guru); ?>">
				<button class="btn btn-success">
					<i class="bi bi-pencil-square"></i> Ubah
				</button>
			</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?= base_url('/tatausaha/hapusguru/'.$id_guru); ?>">
				<button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus guru ?')">
					<i class="bi bi-trash-fill"></i> Hapus
				</button>
			</a>
		</div>
	</div>
</div>
<?= $this->endSection() ?>