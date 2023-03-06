<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <div class="text-center">
                <h4 class="text-primary text-light">WEBSITE SISPEMAS</h4>
            </div>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="ms-3">
                <h6 class="mb-0"></h6>
                Welcome <span><?= $_SESSION['username'] ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-pengaduan" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Pengaduan</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-tanggapan" class="nav-item nav-link"><i class="fa fa-comment me-2" aria-hidden="true"></i>Tanggapan</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-auth/logout.php" class="nav-item nav-link"><i class="fa fa-reply-all me-2" aria-hidden="true"></i>Logout</a>
            <?php } ?>

            <?php if ($_SESSION['level'] == 'admin') { ?>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-masyarakat" class="nav-item nav-link active"><i class="fa fa-user-edit me-2"></i></i>Masyarakat</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-pengaduan" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Pengaduan</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-tanggapan" class="nav-item nav-link"><i class="fa fa-comment me-2" aria-hidden="true"></i>Tanggapan</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-petugas" class="nav-item nav-link"><i class="fa fa-user" aria-hidden="true"></i>Petugas</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-auth/logout.php" class="nav-item nav-link"><i class="fa fa-reply-all me-2" aria-hidden="true"></i>Logout</a>
            <?php } ?>


            <?php if ($_SESSION['level'] == 'petugas') { ?>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-pengaduan" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Pengaduan</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-tanggapan" class="nav-item nav-link"><i class="fa fa-comment me-2" aria-hidden="true"></i>Tanggapan</a>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/ukk-aulia/modul/modul-auth/logout.php" class="nav-item nav-link"><i class="fa fa-reply-all me-2" aria-hidden="true"></i>Logout</a>
            <?php } ?>
        </div>
    </nav>
</div>