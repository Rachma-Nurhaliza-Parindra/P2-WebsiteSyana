<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>User Kosong</h1>
			<p>Tidak ada user yang dapat dilihat. Tolong buat daftar user.</p>

			<div>
				<a href="<?= site_url('admin/user/new') ?>" class="button button-primary">+ Tambah User</a>
			</div>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>