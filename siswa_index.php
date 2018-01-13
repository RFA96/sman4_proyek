<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/13/17
 * Time: 2:58 PM
 */
    include "koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>DAFTAR SISWA</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Siswa</li>
                    <li class="breadcrumb-item active">Daftar Siswa</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar Siswa</h1>
                        <hr>
                        <a href="siswa_form.php?method=create" class="btn btn-primary" style="margin-bottom: 20px"><span class="fa fa-plus"></span> TAMBAH DATA SISWA</a>
                        <?php
                            error_reporting(0);
                            $sukses = $_GET['sukses'];
                            if($sukses == 1)
                            {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Berhasil!</strong> Kelas siswa berhasil di-<i>set</i>
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
                                        <strong>Berhasil!</strong> Kelas siswa berhasil di-<i>ubah</i>
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
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>NISN</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysql_query("SELECT * FROM siswa ORDER BY nama_siswa ASC");
                                        $nomor = 1;

                                        while($h = mysql_fetch_array($q))
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td><?php echo $nomor++;?></td>
                                                    <td><?php echo $h['nisn'];?></td>
                                                    <td><?php echo $h['nama_siswa'];?></td>
                                                    <td><?php echo $h['jenis_kelamin'];?></td>
                                                    <?php
                                                        $qAdaTempat = mysql_query("SELECT k.kelas FROM menempati m INNER JOIN kelas k ON m.kode_kelas = k.kode_kelas WHERE m.id_siswa = ".$h['id_siswa']);
                                                        $fAdaTempat = mysql_fetch_assoc($qAdaTempat);
                                                        if($fAdaTempat['kelas'] == null)
                                                        {
                                                            ?>
                                                                <td style="background-color: red"><font color="white">Belum di-<i>set</i></font></td>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <td><?php echo $fAdaTempat['kelas']?></td>
                                                            <?php
                                                        }
                                                    ?>
                                                    <td>
                                                        <?php
                                                            $qTempat = mysql_query("SELECT * FROM menempati WHERE id_siswa = ".$h['id_siswa']);
                                                            $adaTempat = mysql_num_rows($qTempat);
                                                            if($adaTempat > 0)
                                                            {
                                                                ?>
                                                                    <a href="setkelas_form.php?id_siswa=<?php echo $h['id_siswa'];?>&method=edit" class="btn btn-warning"><span class="fa fa-building"></span> EDIT KELAS</a>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <a href="setkelas_form.php?id_siswa=<?php echo $h['id_siswa'];?>&method=create" class="btn btn-light"><span class="fa fa-building"></span> SET KELAS</a>
                                                                <?php
                                                            }
                                                        ?>
                                                        <a href="siswa_form.php?id_siswa=<?php echo $h['id_siswa']?>&method=edit" class="btn btn-info"><span class="fa fa-edit"></span> EDIT</a>
                                                        <a href="siswa_proses.php?id_siswa=<?php echo $h['id_siswa']?>&crud=delete" class="btn btn-danger" onclick="return confirm('Yakin mau hapus data ini?')"><span class="fa fa-trash"></span> DELETE</a>
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
