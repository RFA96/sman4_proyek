<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/1/18
 * Time: 09:19 AM
 */
    include "koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>DAFTAR MATA PELAJARAN</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Mata Pelajaran</li>
                    <li class="breadcrumb-item active">Daftar Mata Pelajaran</li>
                </ol>

                <?php
                    error_reporting(0);
                    $sukses = $_GET['sukses'];
                    if($sukses == 1)
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Data mata pelajaran berhasil ditambah
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
                            <strong>Berhasil!</strong> Data mata pelajaran berhasil dihapus.
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
                            <strong>Berhasil!</strong> Data mata pelajaran berhasil diubah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }
                ?>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar Mata Pelajaran</h1>
                        <hr>
                        <a class="btn btn-primary" style="margin-bottom: 20px" href="mapel_form.php?method=create"><span class="fa fa-plus"></span> TAMBAH DATA MATA PELAJARAN</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysql_query("SELECT * FROM mata_pelajaran");
                                        $nomor = 1;
                                        while($h = mysql_fetch_assoc($q))
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td><?php echo $nomor++?></td>
                                                    <td><?php echo $h['mata_pelajaran']?></td>
                                                    <td>
                                                        <a href="mapel_form.php?method=edit&kode_mapel=<?php echo $h['kode_mapel']?>" class="btn btn-warning"><span class="fa fa-eye"></span> VIEW AND EDIT</a>
                                                        <a href="mapel_proses.php?crud=delete&kode_mapel=<?php echo $h['kode_mapel']?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="fa fa-trash"></span> DELETE</a>
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
