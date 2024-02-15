<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>List Anggota</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/post/new/') ?>" class="button button-primary" role="button">+ Tulis Anggota</a>
			</div>
			<div style="display: flex; justify-content: flex-start;">
				<form action="" method="GET" style="flex-direction: row; width:360px; display: flex; justify-content: flex-start;">
					<input type="search" name="keyword" placeholder="Cari anggota" value="<?= html_escape($keyword) ?>" style="margin-right: auto;">
					<input type="submit" value="Cari" class="button" style="width: 32%;">
				</form>
			</div>

			<table class="table">
				<thead>
					<tr>
						<th style="width: 2%;">No</th>
						<th style="width: 8%;">Nama Anggota</th>
						<th style="width: 10%;">Divisi</th>
						<th style="width: 15%;">Jabatan</th>
						<th style="width: 15%;">Email</th>
						<th style="width: 15%;">Prodi</th>
						<th style="width: 15%;">No HP</th>
						<th style="width: 10%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($ukmm as $key => $anggota) : ?>
						<tr>
							<td>
								<div><?= $key + 1 ?></div>
							</td>
							<td>
								<div><?= $anggota->title ?></div>
							</td>
							<td>
								<div><?= $anggota->divisi ?></div>
							</td>
							<td>
								<div><?= $anggota->jabatan ?></div>
							</td>
							<td>
								<div><?= $anggota->email ?? 'Belum ada email' ?></div>
							</td>
							<td>
								<div><?= $anggota->prodi ?? 'Belum ada prodi' ?></div>
							</td>
							<td>
								<div><?= $anggota->no_hp ?? 'Belum ada no hp' ?></div>
							</td>
							<td>
								<div class="action" style="display: grid;">
									<a href="<?= site_url('admin/post/edit/' . $anggota->id_anggota) ?>" class="button button-small" role="button">Edit</a>
									<a href="#" data-delete-url="<?= site_url('admin/post/delete/' . $anggota->id_anggota) ?>" class="button button-small button-danger" role="button" onclick="deleteConfirm(this)">Delete</a>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>

		</div>
		<?php $this->load->view('admin/_partials/footer.php') ?>
	</main>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function deleteConfirm(event) {
			Swal.fire({
				title: 'Delete Confirmation!',
				text: 'Are you sure to delete the item?',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonText: 'No',
				confirmButtonText: 'Yes, Delete',
				confirmButtonColor: 'red'
			}).then(dialog => {
				if (dialog.isConfirmed) {
					window.location.assign(event.dataset.deleteUrl);
				}
			});
		}
	</script>

	<?php if ($this->session->flashdata('message')) : ?>
		<script>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('message') ?>'
			})
		</script>
	<?php endif ?>

</body>

</html>