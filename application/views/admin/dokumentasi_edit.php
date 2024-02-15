<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Edit Dokumentasi</h1>

			<form action="<?= base_url('admin/dokumentasi/edit/' . $dokumentasi->id_dokumentasi) ?>" method="POST" enctype="multipart/form-data">
				<div>
					<label for="nama_kegiatan">Nama Kegiatan</label>
					<input type="text" name="nama_kegiatan" class="<?= form_error('nama_kegiatan') ? 'invalid' : '' ?>" placeholder="Nama Kegiatan" value="<?= $dokumentasi->nama_kegiatan ?>" />
					<div class="invalid-feedback">
						<?= form_error('nama_kegiatan') ?>
					</div>
				</div>

				<div>
					<label for="tanggal">Tanggal</label>
					<input type="date" name="tanggal" class="<?= form_error('tanggal') ? 'invalid' : '' ?>" value="<?= $dokumentasi->tanggal ?>" />
					<div class="invalid-feedback">
						<?= form_error('tanggal') ?>
					</div>
				</div>

				<div style="display: flex; gap: 5px;">
					<div>
						<label for="gambar">Upload Dokumentasi</label>
						<input type="file" name="gambar" id="gambar" class="<?= form_error('gambar') ? 'invalid' : '' ?>"/>
						<div class="invalid-feedback">
							<?= form_error('gambar') ?>
						</div>
					</div>
					<div class="gambar">
						<img src="<?= $dokumentasi->gambar ? base_url('uploads/' . $dokumentasi->gambar) : base_url('uploads/default-image.jpg') ?>" class="preview-gambar" width="300" style="object-fit: cover;" alt="Preview Gambar" id="image-preview">
					</div>
				</div>


				<div>
					<label for="content">Deskripsi</label>
					<textarea name="content" cols="30" rows="10" placeholder="Tuliskan deskripsi anda"><?= form_error('content') ? set_value('content') : $dokumentasi->content ?></textarea>
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

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>