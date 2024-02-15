<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Data Uang Kosong</h1>
			<p>Tidak ada uang yang dapat dilihat. Tolong buat daftar Uang.</p>

			<div>
				<a href="<?= site_url('admin/kas/new/') ?>" class="button button-primary">+ Tambah Kas</a>
			</div>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>