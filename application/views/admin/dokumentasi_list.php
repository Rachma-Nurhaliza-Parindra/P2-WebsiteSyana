<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>List Dokumentasi</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/dokumentasi/new/') ?>" class="button button-primary" role="button">+ Tulis Dokumentasi</a>
			</div>
			<div style="display: flex; justify-content: flex-start;">
				<form action="" method="GET" style="flex-direction: row; width:360px; display: flex; justify-content: flex-start;">
					<input type="search" name="keyword" placeholder="Cari dokumentasi" value="<?= html_escape($keyword) ?>" style="margin-right: auto;">
					<input type="submit" value="Cari" class="button" style="width: 32%;">
				</form>
			</div>

			<table class="table" style="margin-bottom: 6rem;">
				<thead>
					<tr>
						<th style="width: 3%;">No</th>
						<th style="width: 10%;">Nama Kegiatan</th>
						<th style="width: 15%;">Tanggal</th>
						<th style="width: 15%;">Dokumentasi</th>
						<th style="width: 15%;">Deskripsi</th>
						<th style="width: 10%;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($ukmm as $key => $dokumentasi) : ?>
						<tr>
							<td>
								<div><?= $key + 1 ?></div>
							</td>
							<td>
								<div><?= $dokumentasi->nama_kegiatan ?></div>
							</td>
							<td>
								<div><?= $dokumentasi->tanggal ?></div>
							</td>
							<td>
								<div>
									<?php if ($dokumentasi->gambar) : ?>
										<img src="<?= base_url('uploads/') . $dokumentasi->gambar ?>" width="200" alt="Gambar dari <?= $dokumentasi->nama_kegiatan ?>">
									<?php else : ?>
										<h3 style="color: gray;">Tidak ada dokumentasi</h3>
									<?php endif ?>
								</div>
							</td>
							<td>
								<div><?= $dokumentasi->content ?></div>
							</td>
							<td>
								<div class="action" style="display: grid;">
									<a href="<?= site_url('admin/dokumentasi/edit/' . $dokumentasi->id_dokumentasi) ?>" class="button button-small" role="button">Edit</a>
									<a href="#" data-delete-url="<?= site_url('admin/dokumentasi/delete/' . $dokumentasi->id_dokumentasi) ?>" class="button button-small button-danger" role="button" onclick="deleteConfirm(this)">Delete</a>
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