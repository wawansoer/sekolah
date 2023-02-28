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
	<form action="<?= base_url('adminWeb/prosesubahberita/'.$idBerita) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="form-group row">
			<label class="col-md-2">Judul Berita</label>
			<div class="col-md-10">
				<input 
				type="text" 
				name="judul_berita" 
				class="form-control" 
				value="<?= $judul_berita;?>" 
				required
				>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2">Upload Gambar Berita</label>
			<div class="col-md-10">
				<input 
				type="file" 
				name="gambar" 
				class="form-control"
				value="<?= $gambar;?>"
				>
				<small class="text-secondary">Maksimal 1024 Kb, Dengan Ekstensi PNG, JPG, JPEG, atau GIF</small>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2">Kategori, Jenis &amp; Status</label>
			<div class="col-md-3">
				<select name="kategori" class="form-control" required>
					<option 
						value="Berita" 
						<?= ($kategori == "Berita" ? "selected" : ""); ?> > 
						Berita 
					</option>
					<option 
						value="Pengumuman" 
						<?= ($kategori == "Pengumuman" ? "selected" : ""); ?>>
						Pengumuman
					</option>
					<option 
						value="Umum" 
						<?= ($kategori == "Umum" ? "selected" : ""); ?>>
						Umum
					</option>
					<option 
						value="Visi & Misi" 
						<?= ($kategori == "Visi & Misi" ? "selected" : ""); ?>>
						Visi & Misi
					</option>
					<option 
						value="Sejarah" 
						<?= ($kategori == "Sejarah" ? "selected" : ""); ?>>
						Sejarah
					</option>
				</select>
				<small class="text-secondary">Kategori</small>
			</div>
		<div class="col-md-3">
			<select name="prioritas" class="form-control">
				<option value="1" <?= ($prioritas == 1 ? "selected" : ""); ?>> &#11088; </option>
				<option value="2" <?= ($prioritas == 2 ? "selected" : ""); ?>> &#11088; &#11088; </option>
				<option value="3" <?= ($prioritas == 3 ? "selected" : ""); ?>> &#11088; &#11088; &#11088;  </option>
				<option value="4" <?= ($prioritas == 4 ? "selected" : ""); ?>> &#11088; &#11088; &#11088; &#11088; </option>
				<option value="5" <?= ($prioritas == 5 ? "selected" : ""); ?>> &#11088; &#11088; &#11088; &#11088; &#11088;</option>			
			</select>
			<small class="text-secondary">Prioritas Konten</small>
		</div>
		<div class="col-md-3">
			<select name="status" class="form-control">
				<option value="Draft" <?= ($status == "Draft" ? "selected" : ""); ?>>Draft</option>
				<option value="Publish" <?= ($status == "Publish" ? "selected" : ""); ?>>Publish</option>
			</select>
			<small class="text-secondary">Status publikasi</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Tanggal dan jam Publikasi</label>
		<div class="col-md-5">
			<input type="date" name="tanggal_publish" class="form-control tanggal" value="<?= $tanggal_post;?>" required>
				<small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?= date('m-d-Y') ?></small>
			</div>
			<div class="col-md-5">
				<input type="time" name="jam" class="form-control jam" value="<?= $waktu_post;?>">
					<small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?= date('H:i:s') ?></small>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-2">Ringkasan</label>
				<div class="col-md-10">
					<input type="text" name="ringkasan" class="form-control" value="<?= $ringkasan;?>" required> 
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-2">Isi Berita</label>
				<div class="col-md-10">
					<textarea name="isi" id="isi" class="form-control" rows="15" ><?= $isi;?></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-2">Keyword Berita (untuk SEO Google)</label>
				<div class="col-md-10">
					<input type="text" name="keyword" class="form-control" value="<?= $keyword;?>" required> 
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