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

	<h1>List Anggota</h1>
	<ul>
		<?php foreach ($ukmm as $anggota) : ?>
			<li>
				<h2><?= html_escape($anggota->title) ?></h2>
				<p>Divisi: <?= html_escape($anggota->divisi) ?></p>
				<p>Jabatan: <?= html_escape($anggota->jabatan) ?></p>
				<p>Email: <?= $anggota->email ?? 'Belum ada email' ?></p>
				<p>Program Studi: <?= $anggota->prodi ?? 'Belum ada prodi' ?></p>
			</li>
		<?php endforeach ?>
	</ul>

	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>