<?= $this->extend('tatausaha/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-6 col-lg-6 col-md-12">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-chalkboard-teacher fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Guru/Tendik</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/tatausaha/guru/'); ?>">
								Detail <i class="fas fa-arrow-right"></i>
							</a>
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-6 col-lg-6 col-md-12">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-file-alt fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Berkas</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/tatausaha/berkas/'); ?>">
								Detail <i class="fas fa-arrow-right"></i>
							</a>
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-6 col-lg-6 col-md-12">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-file-archive fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Berkas Guru</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/tatausaha/berkasguru/'); ?>">
								Detail <i class="fas fa-arrow-right"></i>
							</a>
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-6 col-lg-6 col-md-12">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-bullhorn fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold"> Berkas & Pengumuman</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/tatausaha/pengumuman/'); ?>">
								Detail <i class="fas fa-arrow-right"></i>
							</a>
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?= $this->endSection() ?>