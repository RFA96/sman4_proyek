<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/4/18
 * Time: 11:16 AM
 */
    include "../koneksi.php";

    $kode_kelas = $_GET['kode_kelas'];
    $qKelas = mysql_query("SELECT * FROM kelas WHERE kode_kelas = $kode_kelas");
    $fKelas = mysql_fetch_assoc($qKelas);
?>
<html>
    <head>
        <?php include "materials_css.php"?>
        <title>HALAMAN UTAMA</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php
            include "navbar.php";

            //Get ID Guru
            $qIDGuru = mysql_query("SELECT id_guru FROM guru WHERE nama_guru = '$username'");
            $fIDGuru = mysql_fetch_assoc($qIDGuru);

            //Get Kode Mapel
            $qKodeMapel = mysql_query("SELECT kode_mapel FROM mengajar WHERE id_guru = ".$fIDGuru['id_guru']);
            $fKodeMapel = mysql_fetch_assoc($qKodeMapel);
        ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Kelas</li>
                    <li class="breadcrumb-item active"><?php echo $fKelas['kelas']?></li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar Siswa Kelas <?php echo $fKelas['kelas']?></h1>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $qSiswaKelas = mysql_query("SELECT s.id_siswa, s.nisn, s.nama_siswa, s.jenis_kelamin FROM menempati m INNER JOIN kelas k ON m.kode_kelas = k.kode_kelas INNER JOIN siswa s ON m.id_siswa = s.id_siswa WHERE m.kode_kelas = $kode_kelas AND m.id_tahun_akademik = $tahun_akademik ORDER BY s.nama_siswa ASC");
                                        $nomor = 1;
                                        while($fSiswaKelas = mysql_fetch_assoc($qSiswaKelas))
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td><?php echo $nomor++;?></td>
                                                    <td><?php echo $fSiswaKelas['nisn']?></td>
                                                    <td><?php echo $fSiswaKelas['nama_siswa']?></td>
                                                    <td><?php echo $fSiswaKelas['jenis_kelamin']?></td>
                                                    <td>
                                                        <a href="nilaisiswa_index.php?id_siswa=<?php echo $fSiswaKelas['id_siswa']?>&id_guru=<?php echo $fIDGuru['id_guru']?>&kode_mapel=<?php echo $fKodeMapel['kode_mapel']?>&kode_kelas=<?php echo $kode_kelas?>" class="btn btn-primary">OLAH NILAI</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "materials_js.php"?>
        <?php include "../footer.php"?>
    </body>
</html>