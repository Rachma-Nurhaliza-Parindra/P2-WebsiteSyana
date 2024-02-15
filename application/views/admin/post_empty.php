<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Anggota Kosong</h1>
			<p>Tidak ada anggota yang dapat dilihat. Tolong buat daftar anggota.</p>

			<div>
				<a href="<?= site_url('admin/post/new') ?>" class="button button-primary">+ Tambah Anggota</a>
			</div>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>