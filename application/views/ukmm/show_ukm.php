<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_partials/head.php'); ?>
</head>
<body>
    <?php $this->load->view('_partials/navbar.php'); ?>

    <ukm class="ukm">
        <h1 class="post-title"><?= $anggota->title ? html_escape($anggota->title) : "No Title" ?></h1>
        <div class="post-meta">
            Published at <?= $anggota->created_at ?>
        </div>
        <!-- <div class="post-body">
            <?= $anggota->content ?>
        </div> -->
    </ukm>
    
    <?php $this->load->view('_partials/footer.php'); ?>
</body>
</html>
