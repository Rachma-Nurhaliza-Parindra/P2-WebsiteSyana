<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
	<style>
		.container {
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border-radius: 8px;
			margin-top: 20px;
		}

		.section-buttons {
			text-align: center;
			margin: 20px 0;
		}

		.section-button {
			cursor: pointer;
			background-color: black;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			margin: 10px;
			display: inline-block;
		}

		.section-content {
			display: none;
			max-width: 800px;
			margin: 20px auto;
			text-align: justify;
		}

		h1 {
			text-align: center;
		}
	</style>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>

	<div class="container">

		<h1>Profil UKM SYANDANA NAWASENA</h1>


		<div class="section-buttons">
			<button class="section-button" onclick="showSection('sejarah')">Sejarah Singkat</button>
			<button class="section-button" onclick="showSection('visiMisi')">Visi dan Misi</button>
			<button class="section-button" onclick="showSection('programKegiatan')">Program dan Kegiatan</button>
		</div>

		<div id="dokumentasi" style="display: flex; justify-content: center;">

			<img src="<?= base_url('assets/img/img4.jpg') ?>" alt="Img 1" style="width: 40rem;" id="img1">

		</div>

		<div id="sejarah" class="section-content">
			<div id="dokumentasi" style="display: flex; justify-content: center;">
				<img src="<?= base_url('assets/img/img1.jpg') ?>" alt="Img 1" style="width: 40rem;">
			</div>
			<h2><b>Berdiri Awal</b></h2>
			<p>UKM Tari ULBI didirikan dengan tujuan utama untuk menjadi wadah bagi para mahasiswa yang memiliki minat dan bakat di bidang seni tari. Awal berdirinya UKM Tari ditandai dengan semangat antusias para mahasiswa ULBI yang ingin mengekspresikan kecintaan mereka terhadap seni tari dan berbagi keindahan tarian dengan lingkungan kampus.</p>
			<p>Seiring berjalannya waktu, UKM Tari ULBI aktif mengembangkan keterampilan teknis dan artistik para anggotanya melalui berbagai program pelatihan dan workshop. Sesi pelatihan rutin diadakan setiap minggu, memberikan anggota kesempatan untuk mendalami berbagai jenis tarian, mulai dari yang tradisional hingga kontemporer.</p>
			<p>UKM Tari ULBI tidak hanya menjadi tempat untuk mengembangkan keterampilan tari, tetapi juga menjadi wadah untuk mempromosikan keberagaman budaya. Para anggota UKM Tari aktif dalam merangkul dan memperkenalkan berbagai jenis tarian tradisional dari berbagai daerah di Indonesia. Ini menjadi salah satu upaya UKM Tari ULBI dalam melestarikan kekayaan seni budaya bangsa.</p>
			<p>UKM Tari ULBI selalu bersemangat dalam berpartisipasi dalam pertunjukan di lingkungan kampus dan luar kampus. Keikutsertaan dalam berbagai kompetisi tari menjadi ajang untuk mengeksplorasi bakat dan kreativitas anggota. Prestasi yang diraih dalam kompetisi tersebut menjadi bukti dedikasi dan kerja keras UKM Tari ULBI.</p>
			<p>Selain fokus pada pengembangan internal, UKM Tari ULBI juga aktif berkontribusi pada komunitas kampus dan masyarakat sekitar. Melalui pertunjukan tari dan kegiatan seni, UKM Tari ULBI berusaha menyebarkan keindahan seni tari kepada lebih banyak orang dan mempererat ikatan antara mahasiswa dan masyarakat.</p>
			<p>Seiring berjalannya waktu, UKM Tari ULBI terus berkomitmen untuk menjadi pusat pengembangan dan apresiasi seni tari yang kreatif, inklusif, dan berorientasi pada keberagaman budaya. Mereka terus menginspirasi para mahasiswa untuk menyuarakan ekspresi mereka melalui gerakan tari, menjadikan UKM Tari ULBI sebagai tempat berkumpulnya para pencinta seni tari di lingkungan kampus.</P>
		</div>

		<div id="visiMisi" class="section-content">
			<div id="dokumentasi" style="display: flex; justify-content: center;">
				<img src="<?= base_url('assets/img/img3.jpg') ?>" alt="Img 1" style="width: 40rem; height: 20rem; object-fit: cover;">
			</div>
			<h2><b>Visi</b></h2>
			<p>Menjadi pusat pengembangan dan apresiasi seni tari yang kreatif, inklusif, dan berorientasi pada keberagaman budaya di lingkungan kampus.</p>
			<h2><b>Misi</b></h2>
			<ol>
				<li>Mendorong ekspresi seni melalui berbagai jenis tarian, dari yang tradisional hingga kontemporer.</p>
				<li>Menyediakan platform untuk mahasiswa mengembangkan keterampilan tari dan bakat seni mereka.</p>
				<li>Memperkaya pengalaman mahasiswa dengan workshop, pelatihan, dan pertunjukan tari berkualitas.</li>
				<li>Mempromosikan kebersamaan, kerjasama, dan semangat persaudaraan di antara anggota UKM Tari.</li>
				<li>Berkontribusi pada pelestarian dan penyebarluasan seni budaya di lingkungan kampus dan masyarakat sekitar.</li>
		</div>

		<div id="programKegiatan" class="section-content">
			<div id="dokumentasi" style="display: flex; justify-content: center;">
				<img src="<?= base_url('assets/img/img5.jpg') ?>" alt="Img 1" style="width: 40rem; height: 20rem; object-fit: cover;">
			</div>
			<p><b>Pelatihan Rutin</b></p>
			<p>Setiap minggu, UKM Tari menyelenggarakan sesi pelatihan rutin untuk mengembangkan keterampilan teknis dan artistik anggotanya.</p>
			<p><b>Pertunjukan dan Kompetisi</b></p>
			<p>Berpartisipasi dalam pertunjukan di kampus dan luar kampus, serta kompetisi tari untuk mengeksplorasi bakat dan kreativitas.</p>
			<p><b>Kegiatan Sosial dan Budaya</b></p>
			<p>Mengadakan acara-acara sosial dan budaya guna memperkuat hubungan antaranggota dan meningkatkan kesadaran akan keberagaman budaya.</p>
			<p><b>Struktur Organisasi</b></p>
			<p>UKM Tari memiliki struktur organisasi yang terdiri dari pengurus dan anggota. Setiap anggota memiliki peran dan tanggung jawabnya masing-masing, yang dipilih melalui proses demokratis.</p>

		</div>
	</div>

	<!-- <img src="application/assets/img/syana.jpeg" alt="Pertunjukan Tari" style="max-width: 100%; height: auto; margin-top: 20px;"> -->

	<?php $this->load->view('_partials/footer.php'); ?>


	<script>
		function showSection(sectionId) {
			document.getElementById('img1').setAttribute('hidden', true);
			var sections = document.querySelectorAll('.section-content');
			sections.forEach(function(section) {
				section.style.display = 'none';
			});


			var selectedSection = document.getElementById(sectionId);
			selectedSection.style.display = 'block';
		}
	</script>
</body>

</html>