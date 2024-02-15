<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Dokumentasi Kosong</h1>
			<p>Tidak ada dokumentasi yang dapat dilihat. Tolong buat data dokumentasi.</p>

			<div>
				<a href="<?= site_url('admin/dokumentasi/new/') ?>" class="button button-primary">+ Tambah Dokumentasi</a>
			</div>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>