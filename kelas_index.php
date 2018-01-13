<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/28/17
 * Time: 21:39 PM
 */
    include "koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>DAFTAR KELAS</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Kelas</li>
                    <li class="breadcrumb-item active">Daftar Kelas</li>
                </ol>
                <?php
                    error_reporting(0);
                    $sukses = $_GET['sukses'];
                    if($sukses == 1)
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> Data kelas berhasil ditambah
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    }
                    else if($sukses == 2)
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> Data kelas berhasil dihapus.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    }
                    else if($sukses == 3)
                    {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> <?php echo $_SESSION['errMsg']; unset($_SESSION['errMsg'])?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    }
                    else if($sukses == 4)
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Data kelas berhasil diubah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }
                ?>
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
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar Kelas (T.A. <?php echo $fTA['tahun_akademik']." ".$semester?>)</h1>
                        <hr>
                        <a class="btn btn-primary" style="margin-bottom: 20px" href="kelas_form.php?method=create"><span class="fa fa-plus"></span> TAMBAH DATA KELAS</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysql_query("SELECT k.kode_kelas, k.kelas FROM kelas AS k");
                                        $nomor = 1;
                                        while($h = mysql_fetch_assoc($q))
                                        {
                                            $qWK = mysql_query("SELECT g.nama_guru FROM wali_kelas AS wk INNER JOIN kelas k ON wk.kode_kelas = k.kode_kelas INNER JOIN guru g ON wk.id_guru = g.id_guru WHERE wk.kode_kelas = ".$h['kode_kelas']." AND wk.id_tahun_akademik = ".$tahun_akademik);
                                            $fWK = mysql_fetch_assoc($qWK);
                                            ?>
                                                <tr align="center">
                                                    <td><?php echo $nomor++?></td>
                                                    <td><?php echo $h['kelas']?></td>
                                                    <?php
                                                        if($fWK['nama_guru'] == null)
                                                        {
                                                            ?>
                                                                <td style="background-color: red"><font color="white">Belum di-<i>set</i></font></td>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <td><?php echo $fWK['nama_guru']?></td>
                                                            <?php
                                                        }
                                                        ?>
                                                    <td>
                                                        <a href="kelas_form.php?method=edit&kode_kelas=<?php echo $h['kode_kelas']?>" class="btn btn-warning"><span class="fa fa-eye"></span> VIEW AND EDIT</a>
                                                        <a href="jadwalpelajaran_index.php?kode_kelas=<?php echo $h['kode_kelas']?>&tahun_akademik=<?php echo $tahun_akademik?>" class="btn btn-info"><span class="fa fa-calendar"></span> JADWAL PELAJARAN</a>
                                                        <a href="walikelas_form.php?method=create&kode_kelas=<?php echo $h['kode_kelas']?>" class="btn btn-primary"><span class="fa fa-user"></span> WALI KELAS</a>
                                                        <a href="kelas_proses.php?crud=delete&kode_kelas=<?php echo $h['kode_kelas']?>" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data ini?')"><span class="fa fa-trash"></span> DELETE</a>
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
        <?php include "footer.php";?>
        <?php include "materials_js.php";?>
        <script>
            $(document).ready(function () {
                $('#display').DataTable();
            })
        </script>
    </body>
</html>