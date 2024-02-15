<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Edit Kas</h1>

			<form action="<?= site_url('admin/kas/edit/' . $kas->id_kas) ?>" method="POST">
				<input type="hidden" name="id_kas" id="id_kas" value="<?= $kas->id_kas ?>">
				<div>
					<label for="status">Status</label>
					<select name="status" class="<?= form_error('status') ? 'invalid' : '' ?>">
						<option value="masuk" <?= ($kas->status == 'masuk') ? 'selected' : '' ?>>Masuk</option>
						<option value="keluar" <?= ($kas->status == 'keluar') ? 'selected' : '' ?>>Keluar</option>
					</select>
					<div class="invalid-feedback">
						<?= form_error('status') ?>
					</div>
				</div>

				<div>
					<label for="tanggal">Tanggal</label>
					<input type="date" name="tanggal" class="<?= form_error('tanggal') ? 'invalid' : '' ?>" value="<?= $kas->tanggal ?>" />
					<div class="invalid-feedback">
						<?= form_error('tanggal') ?>
					</div>
				</div>
				<div>
					<label>Nama Kegiatan</label>
					<select name="id_dokumentasi" class="<?= form_error('id_dokumentasi') ? 'invalid' : '' ?>">
						<option value="">--Pilih Kegiatan--</option>
						<?php foreach ($dokumentasi as $key => $d) : ?>
							<option value="<?= $d['id_dokumentasi'] ?>" <?= $kas->id_dokumentasi == $d['id_dokumentasi'] ? 'selected' : '' ?>><?= $d['nama_kegiatan'] ?></option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
						<?= form_error('id_dokumentasi') ?>
					</div>
				</div>

				<div>
					<label for="jumlah">Jumlah</label>
					<input type="text" name="jumlah" class="<?= form_error('jumlah') ? 'invalid' : '' ?>" value="<?= $kas->jumlah ?>" />
					<div class="invalid-feedback">
						<?= form_error('jumlah') ?>
					</div>
				</div>

				<div>
					<label for="deskripsi">Deskripsi</label>
					<input type="text" name="deskripsi" class="<?= form_error('deskripsi') ? 'invalid' : '' ?>" value="<?= $kas->deskripsi ?>" />
					<div class="invalid-feedback">
						<?= form_error('deskripsi') ?>
					</div>
				</div>

				<div>
					<button type="submit" class="button button-primary">Submit</button>
				</div>

			</form>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>