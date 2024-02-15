<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Tulis Uang Kas</h1>

			<form action="<?= site_url('admin/kas/new/') ?>" method="POST">
				<div>
					<label for="status">Status</label>
					<select name="status" class="<?= form_error('status') ? 'invalid' : '' ?>">
						<option value="masuk" <?= set_select('status', 'masuk') ?>>Masuk</option>
						<option value="keluar" <?= set_select('status', 'keluar') ?>>Keluar</option>
					</select>
					<div class="invalid-feedback">
						<?= form_error('status') ?>
					</div>
				</div>

				<div>
					<label for="tanggal">Tanggal</label>
					<input type="date" name="tanggal" class="<?= form_error('tanggal') ? 'invalid' : '' ?>" value="<?= set_value('tanggal') ?>" />
					<div class="invalid-feedback">
						<?= form_error('tanggal') ?>
					</div>
				</div>

				<div>
					<label>Nama Kegiatan</label>
					<select name="id_dokumentasi" class="<?= form_error('id_dokumentasi') ? 'invalid' : '' ?>">
						<option value="">--Pilih Kegiatan--</option>
						<?php foreach ($dokumentasi as $key => $d) : ?>
							<option value="<?= $d['id_dokumentasi'] ?>" <?= set_value('id_dokumentasi') == $d['id_dokumentasi'] ? 'selected' : '' ?>><?= $d['nama_kegiatan'] ?></option>
						<?php endforeach ?>
					</select>
					<div class="invalid-feedback">
						<?= form_error('id_dokumentasi') ?>
					</div>
				</div>
				<div>
					<label for="jumlah">Jumlah</label>
					<input type="text" name="jumlah" class="<?= form_error('jumlah') ? 'invalid' : '' ?>" placeholder="Jumlah" value="<?= set_value('jumlah') ?>" />
					<div class="invalid-feedback">
						<?= form_error('jumlah') ?>
					</div>
				</div>

				<div>
					<label for="deskripsi">Deskripsi</label>
					<input type="text" name="deskripsi" class="<?= form_error('deskripsi') ? 'invalid' : '' ?>" placeholder="Deskripsi" value="<?= set_value('deskripsi') ?>" />
					<div class="invalid-feedback">
						<?= form_error('deskripsi') ?>
					</div>
				</div>

				<div>
					<button type="submit" class="button button-primary">Submit</button>
					<!-- <a href="<?= base_url('admin/kas') ?>" class="btn btn-success">Kembali</a> -->
				</div>

			</form>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>