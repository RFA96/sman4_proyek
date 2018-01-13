<?php
/**
 * Created by PhpStorm.
 * User: Raka_Matsukaze
 * Date: 11/25/17
 * Time: 22:59
 */
    include "koneksi.php";
?>
<html>
    <head>
        <title>ADMIN PAGE</title>
        <?php include "materials_css.php";?>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php";?>
        <?php
            $qTA = mysql_query("SELECT * FROM tahun_akademik WHERE id_tahun_akademik = $tahun_akademik");
            $fTA = mysql_fetch_assoc($qTA);
            if($fTA['semester'] == 1)
            {
                $semester = "Ganjil";
            }
            else
            {
                $semester = "Genap";
            }
        ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard Saya</li>
                </ol>
                <h3>Statistik Tahun Ajaran <?php echo $fTA['tahun_akademik']." Semester ".$semester?></h3>
                <hr>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-graduation-cap"></i>
                                </div>
                                <?php
                                    $q_hS = mysql_query("SELECT COUNT(*) AS hitung FROM siswa");
                                    $h_hS = mysql_fetch_assoc($q_hS);
                                ?>
                                <div class="mr-5"><?php echo $h_hS['hitung']?> Siswa</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="siswa_index.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-users"></i>
                                </div>
                                <?php
                                    $q_hG = mysql_query("SELECT COUNT(*) AS hitung FROM guru");
                                    $h_hG = mysql_fetch_assoc($q_hG);
                                ?>
                                <div class="mr-5"><?php echo $h_hG['hitung']?> Guru</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="guru_index.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-clipboard"></i>
                                </div>
                                <?php
                                    $q_hK = mysql_query("SELECT COUNT(*) AS hitung FROM kelas");
                                    $h_hK = mysql_fetch_assoc($q_hK);
                                ?>
                                <div class="mr-5"><?php echo $h_hK['hitung']?> Kelas</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-user"></i>
                                </div>
                                <?php
                                    $q_hL = mysql_query("SELECT COUNT(*) AS hitung FROM login");
                                    $h_hL = mysql_fetch_assoc($q_hL);
                                ?>
                                <div class="mr-5"><?php echo $h_hL['hitung']?> Users</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="admin_login_index.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "materials_js.php"?>
        </div>
        <?php include "footer.php"?>
    </body>
</html>