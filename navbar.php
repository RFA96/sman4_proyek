<?php
    session_start();
    $username = $_SESSION['username'];
    $tahun_akademik = $_SESSION['tahun_akademik'];
    $query = mysql_query("SELECT * FROM login WHERE username = '$username'");
    $data = mysql_fetch_array($query);
    if(!$_SESSION['username'])
    {
        header("location: index.php");
    }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin_index.php">SMAN 4 Bekasi Admin Page</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="admin_index.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Siswa">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-graduation-cap"></i>
                    <span class="nav-link-text">Siswa</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="siswa_index.php">Daftar Siswa</a>
                    </li>
                    <li>
                        <a href="siswa_daftar_login.php">Daftar Login Siswa</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Guru">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti1">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Guru</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti1">
                    <li>
                        <a href="guru_index.php">Daftar Guru</a>
                    </li>
                    <li>
                        <a href="guru_daftar_login.php">Daftar Login Guru</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="kelas_index.php">
                    <i class="fa fa-fw fa-building"></i>
                    <span class="nav-link-text">Kelas</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="mapel_index.php">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">Mata Pelajaran</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="admin_login_index.php">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Daftar Login Admin</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fa fa-fw fa-user"></i> <?php echo $data['nama_user'];?>
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