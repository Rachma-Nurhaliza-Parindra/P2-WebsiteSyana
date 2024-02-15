<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
	<style>
		body {
			font-family: 'Noto Serif', serif;
			background-color: #f8f8f8;
			color: #333;
			margin: 0;
			padding: 0;
			text-align: center;
		}

		.container {
			width: 100%;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border-radius: 8px;
			margin-top: 20px;
		}

		.main-content {
			text-align: justify;
		}

		.sambutan {
			text-align: center;
			padding: 20px;
			border-bottom: 1px solid #ddd;
		}

		.sambutan p {
			font-size: 16px;
			line-height: 1.6;
			margin-bottom: 20px;
		}

		.sambutan h1 {
			color: #3498db;
			font-family: 'Calibri', sans-serif;
		}

		.salam-tari {
			font-style: italic;
			color: #777;
		}

		h2 {
			color: black;
			font-family: 'Calibri', sans-serif;
			margin-top: 20px;
		}

		/* Media Queries */
		@media screen and (min-width: 600px) {
			.container {
				max-width: 800px;
				margin: 0 auto;
			}
		}
	</style>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>

	<h1>Selamat datang di UKM Syandana Nawasena</h1>

	<div class="container">
		<div class="main-content">
			<div class="sambutan">

				<img src="<?= base_url('assets/img/img2.jpg') ?>" style="width: 40rem; margin-bottom: 2rem;" alt="Img 2">

				<p>Sebuah sambutan hangat untuk semua pengunjung, mahasiswa, dan peminat seni tari di lingkungan kampus kami. Kami dengan bangga mempersembahkan UKM Tari, wadah kreativitas dan ekspresi seni tari yang menjadi bagian tak terpisahkan dari kehidupan mahasiswa di Universitas Logistik Bisnis Internasional.</p>

				<p>Sebagai bagian dari komunitas yang dinamis dan beragam, UKM Tari tidak hanya berfokus pada keindahan gerakan tari, tetapi juga merangkul keberagaman budaya dan seni tradisional. Kami mempercayai bahwa tari adalah bahasa universal yang dapat menghubungkan hati, menggambarkan cerita, dan menyampaikan emosi tanpa kata-kata.</p>

				<p>Dalam UKM Tari, kami membuka pintu untuk semua mahasiswa yang tertarik untuk menggali bakat mereka dalam seni tari, tanpa memandang latar belakang pengalaman atau kemampuan. Bersama-sama, kita akan mengeksplorasi berbagai jenis tarian, dari yang tradisional hingga modern, menciptakan pertunjukan yang memukau dan membangkitkan semangat kolaborasi.</p>

				<p>Melalui berbagai latihan, workshop, dan pertunjukan yang kami adakan, kami berkomitmen untuk memberikan pengalaman berharga dan memperkaya kehidupan mahasiswa di luar kelas. UKM Tari adalah tempat di mana kreativitas berkembang, persahabatan terjalin, dan semangat kebersamaan mekar.</p>

				<p>Mari bergabung dan menjadi bagian dari keluarga UKM Tari Universitas Logistik Bisnis Internasional. Bersama-sama, mari kita merayakan keunikan setiap gerakan, merajut ikatan persahabatan, dan mengukir kenangan indah dalam dunia tari di kampus ini.</p>

				<p>Terima kasih atas perhatian dan semangat partisipasinya. Mari bergerak bersama, merayakan seni tari, dan menciptakan kenangan yang abadi!</p>

				<p class="salam-tari">Salam Tari, SYANA Universitas Logistik Bisnis Internasional</p>
			</div>
		</div>
	</div>

	<h2>"Tarian Jiwa, Ekspresi Sejati Melangkah Bersama Keindahan dan Kebudayaan di UKM Tari Universitas Logistik Bisnis Internasional."</h2>

	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>