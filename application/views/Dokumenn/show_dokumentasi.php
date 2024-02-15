<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_partials/head.php'); ?>
</head>
<body>
    <?php $this->load->view('_partials/navbar.php'); ?>

    <dokumentasi class="dokumentasi">
        <h1 class="post-nama_kegiatan"><?= $dokumentasi->nama_kegiatan ? html_escape($dokumentasi->nama_kegiatan) : "No Title" ?></h1>
        <!-- <div class="post-meta">
            Published at <?= $anggota->created_at ?>
        </div> -->
        <div class="post-body">
            <?= $dokumentasi->tanggal ?>
        </div>
        <div class="post-body">
            <?= $dokumentasi->gambar ?>
        </div>
        <div class="post-body">
            <?= $dokumentasi->content ?>
        </div>
</dokumentasi>
    
    <?php $this->load->view('_partials/footer.php'); ?>
</body>
</html>
