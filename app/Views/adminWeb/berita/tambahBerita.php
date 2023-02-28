<?= $this->extend('adminWeb/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<?php if (!empty(session()->getFlashdata('error'))) : ?>
	<div class="alert alert-light-danger">
		<h4 class="alert-heading">Silahkan Periksa Entrian Form</h4>
		<?php echo session()->getFlashdata('error'); ?>
	</div>
<?php endif; ?>

<?php if (!empty(session()->getFlashdata('message'))) : ?>
<div class="alert alert-light-success">
	<h4 class="alert-heading">Selamat !</h4>
	<?php echo session()->getFlashdata('message'); ?>
</div>
<?php endif; ?>

</div>
<div class="row">
	<form action="<?= base_url('adminWeb/prosestambahberita') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="form-group row">
			<label class="col-md-2">Judul Berita</label>
			<div class="col-md-10">
				<input type="text" name="judul_berita" class="form-control" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2">Upload Gambar Berita</label>
			<div class="col-md-10">
				<input type="file" name="gambar" class="form-control">
				<small class="text-secondary">Maksimal 1024 Kb, Dengan Ekstensi PNG, JPG, JPEG, atau GIF</small>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2">Kategori, Jenis &amp; Status</label>
			<div class="col-md-3">
				<select name="kategori" class="form-control">
					<option value="Berita">Berita</option>
					<option value="Pengumuman">Pengumuman</option>
					<option value="Umum">Umum</option>
					<option value="Visi & Misi">Visi & Misi</option>
					<option value="Sejarah">Sejarah</option>
					<option value="Umum">Umum</option>
				</select>
				<small class="text-secondary">Kategori</small>
			</div>
			<div class="col-md-3">
				<select name="prioritas" class="form-control">
					<option value="1"> &#11088; </option>
					<option value="2"> &#11088; &#11088; </option>
					<option value="3"> &#11088; &#11088; &#11088;  </option>
					<option value="4"> &#11088; &#11088; &#11088; &#11088; </option>
					<option value="5"> &#11088; &#11088; &#11088; &#11088; &#11088;</option>			
				</select>
				<small class="text-secondary">Prioritas Konten</small>
			</div>
			<div class="col-md-3">
				<select name="status" class="form-control">
					<option value="Draft">Draft</option>
					<option value="Publish">Publish</option>
				</select>
				<small class="text-secondary">Status publikasi</small>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2">Tanggal dan jam Publikasi</label>
			<div class="col-md-5">
				<input type="date" name="tanggal_publish" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_publis'])) {
					echo set_value('tanggal_publish');
					} else {
						echo date('m-d-Y');
					} ?>" required>
					<small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?= date('m-d-Y') ?></small>
				</div>
				<div class="col-md-5">
					<input type="time" name="jam" class="form-control jam" value="<?php if (isset($_POST['jam'])) {
						echo set_value('jam');
						} else {
							echo date('H:i:s');
						} ?>">
						<small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?= date('H:i:s') ?></small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-2">Ringkasan</label>
					<div class="col-md-10">
						<textarea name="ringkasan" class="form-control" required></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-2">Isi Berita</label>
					<div class="col-md-10">
						<textarea name="isi" id="isi" class="form-control" rows="15"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-2">Keyword Berita (untuk SEO Google)</label>
					<div class="col-md-10">
						<textarea name="keyword" class="form-control" required></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-2"></label>
					<div class="col-md-10">
						<button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i> Simpan</button>
					</div>
				</div>
			</form>
		</div>

		<script src="<?= base_url('assets/vendors/tinymce/tinymce.min.js');?>"></script>
		<script src="<?= base_url('assets/vendors/tinymce/plugins/code/plugin.min.js');?>"></script>
		<script>
			tinymce.init({ selector: '#isi' });
		</script>

		<?= $this->endSection() ?>