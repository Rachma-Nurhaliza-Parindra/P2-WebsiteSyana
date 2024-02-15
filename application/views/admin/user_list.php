<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>List User</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/post/new/') ?>" class="button button-primary" role="button">+ Tulis User</a>
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
						<th style="width: 10%;" class="text-center">Nama User</th>
						<th style="width: 6%;" class="text-center">Id Dokumentasi</th>
						<th style="width: 10%;" class="text-center">Username</th>
						<th style="width: 12%;" class="text-center">Email</th>
						<th style="width: 15%;" class="text-center">Last Login</th>
						<th style="width: 20%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($ukmm as $user) : ?>
						<tr>
							<td>
								<div><?= $user->name ?></div>
							</td>
							<td>
								<div><?= $user->id_dokumentasi ?></div>
							</td>
							<td>
								<div><?= $user->dokumentasi_nama_kegiatan ?></div>
							</td>
							<td>
								<div><?= $user->username ?></div>
							</td>
							<td>
								<div><?= $user->email ?></div>
							</td>
							<td>
								<div><?= $user->last_login ?></div>
							</td>
							<td>
								<div class="action">
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