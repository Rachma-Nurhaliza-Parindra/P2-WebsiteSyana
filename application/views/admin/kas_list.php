<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<?php $this->load->view('admin/_partials/side_nav.php') ?>
	<main class="main">

		<div class="content">
			<h1>List Kas</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/kas/new/') ?>" class="button button-primary" role="button">+ Tulis Kas</a>
			</div>
			<!-- <div style="display: flex; justify-content: flex-start;">
				<form action="" method="GET" style="flex-direction: row; width:360px; display: flex; justify-content: flex-start;">
					<input type="search" name="keyword" placeholder="Cari " value="<?= html_escape($keyword) ?>" style="margin-right: auto;">
					<input type="submit" value="Cari" class="button" style="width: 32%;">
				</form>
			</div> -->

			<table class="table">
				<thead>
					<tr>
						<th style="width: 5%;">No</th>
						<th style="width: 10%;">Tanggal</th>
						<th style="width: 10%;">Nama Kegiatan</th>
						<th style="width: 5%;">Status</th>
						<th style="width: 5%;">Deskripsi</th>
						<th style="width: 7%;">Jumlah Uang</th>
						<th style="width: 6%;">Total Uang</th>
						<th style="width: 10%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$total = 0;
					foreach ($ukmm as $key => $kas) :
						if ($kas->status == 'masuk') {
							$total += $kas->jumlah;
						} else if ($kas->status == 'keluar') {
							$total -= $kas->jumlah;
						}
					?>
						<tr>
							<td>
								<div><?= $key + 1 ?></div>
							</td>
							<td>
								<div><?= $kas->tanggal ?></div>
							</td>
							<td>
								<div><?= $kas->nama_kegiatan ?></div>
							</td>
							<td>
								<div><?= $kas->status ?></div>
							</td>
							<td>
								<div><?= $kas->deskripsi ?></div>
							</td>
							<td>
								<div>Rp. <?= number_format($kas->jumlah, 0, ',', '.') ?></div>
							</td>
							<td>
								<div>Rp. <?= number_format($total, 0, ',', '.') ?></div> <!-- Menampilkan total uang keseluruhan -->
							</td>
							<td>
								<div class="action" style="display: grid;">
									<a href="<?= site_url('admin/kas/edit/' . $kas->id_kas) ?>" class="button button-small" role="button">Edit</a>
									<a href="#" data-delete-url="<?= site_url('admin/kas/delete/' . $kas->id_kas) ?>" class="button button-small button-danger" role="button" onclick="deleteConfirm(this)">Delete</a>
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

	<!-- Tambahkan script untuk dropdown
    <script>
        const kasData = <?= json_encode($id_dokumentasi) ?>; // Mengambil data kas

        const populateDropdown = () => {
            const dropdowns = document.querySelectorAll('.nama_kegiatan');

            dropdowns.forEach((dropdown, index) => {
                const kasId = dropdown.dataset.kasId;
                const selectedKas = kasData.find(kas => kas.id_kas === parseInt(kasId));

                const option = document.createElement('option');
                option.value = selectedKas.id_dokumentasi;
                option.text = selectedKas.nama_kegiatan;

                dropdown.appendChild(option);
            });
        };

        populateDropdown();
    </script> -->

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