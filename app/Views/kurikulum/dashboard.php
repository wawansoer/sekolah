<?= $this->extend('kurikulum/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-6 col-lg-6 col-md-12">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-university fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Kelas</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/kurikulum/kelas/'); ?>">
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
							<i class="fab fa-leanpub fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Mata Pelajaran</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/kurikulum/mapel/'); ?>">
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
							<i class="fas fa-calendar-week fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Jadwal Pelajaran</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/kurikulum/jadwal/'); ?>">
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
							<a href="<?= base_url('/kurikulum/pengumuman/'); ?>">
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