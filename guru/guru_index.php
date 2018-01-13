<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/2/18
 * Time: 19:50 PM
 */
    include "../koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php"?>
        <title>HALAMAN UTAMA</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard Saya</li>
                </ol>
                <?php
                    $qGuru = mysql_query("SELECT * FROM guru WHERE nama_guru = '$username'");
                    $fGuru = mysql_fetch_assoc($qGuru);
                ?>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Selamat Datang Di Halaman Guru</h1>
                        <hr>
                        <div class="card">
                            <div class="card-header"><strong>A. Data Guru</strong></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: bold">NIP</td>
                                                <td align="center">:</td>
                                                <td><?php echo $fGuru['nip_guru'];?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">Nama Guru</td>
                                                <td align="center">:</td>
                                                <td><?php echo $fGuru['nama_guru'];?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">Jenis Kelamin</td>
                                                <td align="center">:</td>
                                                <td><?php echo $fGuru['jenis_kelamin'];?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">Tempat, Tanggal Lahir</td>
                                                <td align="center">:</td>
                                                <td><?php echo $fGuru['tempat_lahir'].', '.$fGuru['tanggal_lahir'];?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">Alamat</td>
                                                <td align="center">:</td>
                                                <td><?php echo $fGuru['alamat_guru'];?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">Telepon</td>
                                                <td align="center">:</td>
                                                <td><?php echo $fGuru['telepon_guru'];?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">Email</td>
                                                <td align="center">:</td>
                                                <td><?php echo $fGuru['email_guru'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><br>
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
                        <div class="card">
                            <div class="card-header"><strong>B. Data Semester Berjalan</strong></div>
                            <div class="card-body">
                                <table class="table table-hover table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold">Tahun Akademik</td>
                                            <td align="center">:</td>
                                            <td><?php echo $fTA['tahun_akademik']?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold">Semester</td>
                                            <td align="center">:</td>
                                            <td><?php echo $fTA['semester']." (".$semester.")"?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "materials_js.php"?>
        <?php include "../footer.php"?>
    </body>
</html>
