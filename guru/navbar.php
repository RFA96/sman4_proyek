<?php
    include "../koneksi.php";
    session_start();
    $username = $_SESSION['username'];
    $tahun_akademik = $_SESSION['tahun_akademik'];
    $query = mysql_query("SELECT id_guru, nama_guru, kode_login, password FROM guru WHERE nama_guru = '$username'");
    $data = mysql_fetch_assoc($query);
    if(!$_SESSION['username'])
    {
        header("location: index.php");
    }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="guru_index.php">SMAN 4 Bekasi Teacher Page</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="guru_index.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kelas">
                <a class="nav-link" data-toggle="collapse" data-placement="right">
                    <i class="fa fa-fw fa-building"></i>
                    <span class="nav-link-text">Kelas Ajar</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fa fa-fw fa-user"></i> <?php echo $username;?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" onclick="return confirm('Yakin akan keluar?')">
                    <i class="fa fa-fw fa-sign-out"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</nav>