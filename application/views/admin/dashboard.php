<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Overview</h1>

			<div style="display:flex; gap: 1em">
				<div class="card text-center" style="width: 100px;">
					<h2>
						<?= $ukm_count ?>
					</h2>
					<p><a href="<?= site_url('admin/post') ?>">Data Anggota</a></p>
				</div>
				<div class="card text-center" style="width: 100px;">
					<h2>
						<?= $feedback_count ?>
					</h2>
					<p><a href="<?= site_url('admin/feedback') ?>">Feedback</a></p>
				</div>
				<div class="card text-center" style="width: 100px;">
					<h2>
						<?= $kas_count ?>
					</h2>
					<p><a href="<?= site_url('admin/kas') ?>">Data Kas</a></p>
				</div>
			</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
</body>

</html>