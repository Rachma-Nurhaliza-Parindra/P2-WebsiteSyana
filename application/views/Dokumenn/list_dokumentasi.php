<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
	<style>
		body {
			font-family: 'Noto Serif', serif;
			background-color: #f8f8f8;
			color: #333;
			margin: 0;
			padding: 0;
			text-align: center;
		}

		h1 {
			color: black;
		}

		ul {
			list-style: none;
			padding: 0;
		}

		li {
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border-radius: 8px;
			margin: 20px;
			padding: 20px;
			text-align: left;
		}

		h2 {
			color: black;
		}

		p {
			margin: 10px 0;
		}

		/* Media Queries */
		@media screen and (min-width: 600px) {
			li {
				max-width: 600px;
				margin: 20px auto;
			}
		}
	</style>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>

	<h1>List Dokumentasi</h1>
	<ul>
		<?php foreach ($dokumenn as $key => $dokumentasi) : ?>
			<li>
				<h2><?= html_escape($dokumentasi->nama_kegiatan) ?></h2>
				<p>Tanggal: <?= html_escape($dokumentasi->tanggal) ?></p>
				<p>Deskripsi: <?= html_escape($dokumentasi->content) ?></p>
				<div style="display: grid; gap:5px;">
					<p>Gambar: </p>
					<?php if ($dokumentasi->gambar) : ?>
						<img src="<?= base_url('uploads/' . $dokumentasi->gambar) ?>" width="200" style="object-fit: cover;" alt="">
					<?php else : ?>
						<p>Dokumentasi belum ada</p>
					<?php endif ?>
				</div>
			</li>
		<?php endforeach ?>
	</ul>

	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>