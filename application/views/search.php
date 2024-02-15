<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_partials/head.php'); ?>
</head>

<body>
    <?php $this->load->view('_partials/navbar.php'); ?>

    <div class="container" style="text-align: center;">
    <h1>Cari Disini</h1>
    <p>Tuliskan kata kunci anggota yang ingin kamu cari</p>
    <form action="" method="get" style="display: inline-block;">
        <div>
            <input type="search" name="keyword" style="width: 360px;" placeholder="Keyword.." value="<?= html_escape($keyword) ?>" required maxlength="32" />
        </div>
        <div style="margin-top: 10px;">
            <input type="submit" class="button button-primary" value="Cari">
        </div>
    </form>
</div>

<?php if ($search_result) : ?>
    <div class="search-result" style="text-align: center;">
        <hr>
        <?php foreach ($search_result as $anggota) : ?>
            <h2><?= html_escape($anggota->title) ?></h2>
            <p><?= strip_tags(substr($anggota->content, 0, 200)) ?></p>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <?php if ($keyword) : ?>
        <div style="height: 400px; text-align: center;">
            <h1>Tidak ada yang ditemukan</h1>
        </div>
    <?php endif ?>
<?php endif ?>

<?php if ($search_result) : ?>
    <div class="search-result" style="text-align: center;">
        <hr>
        <?php foreach ($search_result as $dokumentasi) : ?>
            <h2><?= html_escape($dokumentasi->nama_kegiatan) ?></h2>
            <p><?= strip_tags(substr($dokumentasi->content, 0, 200)) ?></p>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <?php if ($keyword) : ?>
        <div style="height: 400px; text-align: center;">
            <h1>Tidak ada yang ditemukan</h1>
        </div>
    <?php endif ?>
<?php endif ?>

    <?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>