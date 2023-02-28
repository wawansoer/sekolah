<?= $this->extend('keuangan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h4> Formulir Penambahan Jenis Transaksi </h4>
		</div>
		<div class="card-body">
			<?php if (!empty(session()->getFlashdata('error'))) : ?>
				<div class="alert alert-danger bg-gradient" role="alert">
					<strong>Mohon maaf Gagal Simpan Data ! </strong> <?php echo session()->getFlashdata('error'); ?>
				</div>
			<?php endif; ?>
			<form action="<?= base_url('keuangan/prosestambahjenistransaksi') ?>" method="post" accept-charset="utf-8">
				<?= csrf_field(); ?>
				<div class="row mb-3">
					<label for="jenisTransaksi" class="col-sm-4 col-form-label">Jenis Transaksi</label>
					<div class="col-sm-8">
						<select name="jenisTransaksi" class="form-control" required>
							<option value="" <?= (old('jenisTransaksi') == "" ? "selected" : ""); ?>> -- Pilih Jenis Transaksi -- </option>
							<option value="Pemasukan" <?= (old('jenisTransaksi') == "Pemasukan" ? "selected" : ""); ?>> Pemasukan </option>
							<option value="Pengeluaran" <?= (old('jenisTransaksi') == "Pengeluaran" ? "selected" : ""); ?>> Pengeluaran </option>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label for="namaTransaksi" class="col-sm-4 col-form-label">Nama Transaksi</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="namaTransaksi" name="namaTransaksi" value="<?= old('jenisTransaksi'); ?>" required>
					</div>
				</div>
				<div class="d-grid gap-2 d-md-block text-end">
					<button type="submit" class="btn btn-success bg-gradient">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
<?= $this->endSection() ?>