<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Tambah Dokumentasi Baru</h1>

			<form action="<?= base_url('admin/dokumentasi/new') ?>" method="POST" enctype="multipart/form-data">
				<div>
					<label for="nama_kegiatan">Nama Kegiatan</label>
					<input type="text" name="nama_kegiatan" class="<?= form_error('nama_kegiatan') ? 'invalid' : '' ?>" placeholder="Nama Kegiatan" value="<?= set_value('nama_kegiatan') ?>" />
					<div class="invalid-feedback">
						<?= form_error('nama_kegiatan') ?>
					</div>
				</div>

				<div>
					<label for="tanggal">Tanggal</label>
					<input type="date" name="tanggal" class="<?= form_error('tanggal') ? 'invalid' : '' ?>" value="<?= set_value('tanggal') ?>" />
					<div class="invalid-feedback">
						<?= form_error('tanggal') ?>
					</div>
				</div>

				<div style="display: flex; gap: 5px;">
					<div>
						<label for="gambar">Upload Dokumentasi</label>
						<input type="file" name="gambar" id="gambar" class="<?= form_error('gambar') ? 'invalid' : '' ?>" required />
						<div class="invalid-feedback">
							<?= form_error('gambar') ?>
						</div>
					</div>
					<div class="gambar">
						<img src="<?= base_url('/uploads/default-image.jpg') ?>" class="preview-gambar" width="300" style="object-fit: cover;" alt="Preview Gambar" id="image-preview">
					</div>
				</div>


				<div>
					<label for="deskripsi">Deskripsi</label>
					<input type="text" name="content" class="<?= form_error('content') ? 'invalid' : '' ?>" placeholder="Deskripsi" value="<?= set_value('content') ?> " />
					<div class="invalid-feedback">
						<?= form_error('content') ?>
					</div>
				</div>

				<div>
					<button type="submit" class="button button-primary">Submit</button>
				</div>
			</form>

			<script>
				const canvasImg = document.getElementById('image-preview')
				const photo = document.getElementById('gambar')
				photo.addEventListener('change', (e) => {
					canvasImg.src = URL.createObjectURL(photo.files[0])
				})
			</script>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>