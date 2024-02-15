<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>Tulis Nama Anggota</h1>

			<form action="<?= site_url('admin/post/new') ?>" method="POST">
				<div>
					<label for="title">Nama Anggota</label>
					<input type="text" name="title" class="<?= form_error('title') ? 'invalid' : '' ?>" placeholder="Nama Anggota" value="<?= set_value('title') ?>" />
					<div class="invalid-feedback">
						<?= form_error('title') ?>
					</div>
				</div>

				<div>
					<label for="divisi">Divisi</label>
					<input type="text" name="divisi" class="<?= form_error('divisi') ? 'invalid' : '' ?>" placeholder="Divisi" value="<?= set_value('divisi') ?>" />
					<div class="invalid-feedback">
						<?= form_error('divisi') ?>
					</div>
				</div>

				<div>
					<label for="jabatan">Jabatan</label>
					<input type="text" name="jabatan" class="<?= form_error('jabatan') ? 'invalid' : '' ?>" placeholder="Jabatan" value="<?= set_value('jabatan') ?>" />
					<div class="invalid-feedback">
						<?= form_error('jabatan') ?>
					</div>
				</div>

				<div>
					<label for="email">Email</label>
					<input type="email" name="email" class="<?= form_error('email') ? 'invalid' : '' ?>" placeholder="example@example.com" value="<?= set_value('email') ?>" />
					<div class="invalid-feedback">
						<?= form_error('email') ?>
					</div>
				</div>

				<div style="display: grid; gap: 5px;">
					<?php
					$prodi = ['D4 Teknik Informatika', 'D4 Akuntansi Keuangan', 'D4 Manejemen Bisnis', 'D4 Logistik Bisnis', 'D4 E-Commerce Logistik', 'D3 Teknik Informatika', 'D3 Sistem Informasi', 'D3 Akuntansi', 'D3 Manajemen Bisnis', 'D3 Manajemen Logistik'];
					?>
					<label for="prodi">Program Studi</label>
					<select name="prodi" id="prodi" class="<?= form_error('prodi') ? 'invalid' : '' ?>" style="padding: 10px; border-radius: 3px;">
						<option value="">-- Pilih --</option>
						<?php foreach ($prodi as $p) : ?>
							<option value="<?= $p ?>"><?= $p ?></option>
						<?php endforeach ?>
					</select>
					<div class="invalid-feedback">
						<?= form_error('prodi') ?>
					</div>

					<div>
						<label for="no_hp">No HP</label>
						<input type="number" name="no_hp" pattern="[0-9]*" class="<?= form_error('no_hp') ? 'invalid' : '' ?>" placeholder="0xxxxxx" value="<?= set_value('no_hp') ?>" />
						<div class="invalid-feedback">
							<?= form_error('no_hp') ?>
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