<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-newspaper fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Berita</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/adminWeb/berita/'); ?>">
								Detail <i class="fas fa-arrow-right"></i>
							</a>
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-user-tie fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Sambutan Kepala Sekolah</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/adminWeb/sambutankepsek/'); ?>">
								Detail <i class="fas fa-arrow-right"></i>
							</a>
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-chalkboard-teacher fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Tenaga Pendidik</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/adminWeb/tendik/'); ?>">
								Detail <i class="fas fa-arrow-right"></i>
							</a>
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-5">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="fas fa-chalkboard-teacher fa-2x text-white"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h5 class="text-muted font-semibold">Sarana & Prasarana</h5>
						<h6 class="font-extrabold mb-0">
							<a href="<?= base_url('/adminWeb/sarpras/'); ?>">
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