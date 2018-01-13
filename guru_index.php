<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/25/17
 * Time: 6:49 PM
 */
    error_reporting(0);
    include "koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>DAFTAR GURU</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Guru</li>
                    <li class="breadcrumb-item active">Daftar Guru</li>
                </ol>
                <?php
                    $sukses = $_GET['sukses'];
                    if($sukses == 1)
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> Data guru berhasil dihapus.
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
                                <strong>Berhasil!</strong> Data guru berhasil ditambah
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
                                <strong>Berhasil!</strong> Data guru berhasil diubah
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    }
                    else if($sukses == 6)
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Mata pelajaran berhasil di-<i>set</i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }
                    else if($sukses == 7)
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Mata pelajaran berhasil diubah
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }
                ?>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar Guru</h1>
                        <hr>
                        <a href="guru_form.php?method=create" class="btn btn-primary" style="margin-bottom: 20px"><span class="fa fa-plus"></span> TAMBAH DATA GURU</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" cellspacing="0" id="display" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Mata Pelajaran yang Diampu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysql_query("SELECT * FROM guru ORDER BY nama_guru ASC");
                                        $nomor = 1;
                                        while($f = mysql_fetch_assoc($q))
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td><?php echo $nomor++?></td>
                                                    <td><?php echo $f['nip_guru']?></td>
                                                    <td><?php echo $f['nama_guru']?></td>
                                                    <td><?php echo $f['jenis_kelamin']?></td>
                                                    <?php
                                                        $qMapel = mysql_query("SELECT m2.mata_pelajaran FROM mengajar AS m INNER JOIN mata_pelajaran m2 ON m.kode_mapel = m2.kode_mapel WHERE m.id_guru = ".$f['id_guru']);
                                                        $fMapel = mysql_fetch_assoc($qMapel);
                                                        if($fMapel['mata_pelajaran'] == null)
                                                        {
                                                            ?>
                                                                <td style="background-color: red"><font color="white">Belum di-<i>set</i></font></td>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <td><?php echo $fMapel['mata_pelajaran']?></td>
                                                            <?php
                                                        }
                                                    ?>
                                                    <td>
                                                        <?php
                                                            $qAdaMapel = mysql_query("SELECT kode_mapel FROM mengajar WHERE id_guru = ".$f['id_guru']);
                                                            $fAdaMapel = mysql_fetch_assoc($qAdaMapel);
                                                            if($fAdaMapel['kode_mapel'] == null)
                                                            {
                                                                ?>
                                                                    <a href="guru_mapel_form.php?method=create&id_guru=<?php echo $f['id_guru']?>" class="btn btn-light"><span class="fa fa-book"></span> SET MATA PELAJARAN</a>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <a href="guru_mapel_form.php?method=edit&id_guru=<?php echo $f['id_guru']?>" class="btn btn-info"><span class="fa fa-book"></span> EDIT MATA PELAJARAN</a>
                                                                <?php
                                                            }
                                                        ?>
                                                        <a href="guru_form.php?id_guru=<?php echo $f['id_guru']?>&method=edit" class="btn btn-warning"><span class="fa fa-edit"></span> EDIT</a>
                                                        <a href="guru_proses.php?crud=delete&id_guru=<?php echo $f['id_guru']?>" class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')"><span class="fa fa-trash"></span> DELETE</a>
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