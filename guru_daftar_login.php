<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/28/17
 * Time: 09:34 AM
 */
    include "koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>DAFTAR LOGIN GURU</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="admin_index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="guru_index.php">Guru</a>
                    </li>
                    <li class="breadcrumb-item active">Daftar Login Guru</li>
                </ol>

                <?php
                    error_reporting(0);
                    $sukses = $_GET['sukses'];
                    if($sukses == 1)
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> Akun berhasil di-<i>reset</i>. Silahkan cek email!
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
                            <strong>Berhasil!</strong> Akun login guru berhasil diubah
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

                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar Login Guru</h1>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>Nama Guru</th>
                                        <th>Kode Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysql_query("SELECT id_guru, nama_guru, kode_login FROM guru ORDER BY nama_guru ASC");
                                        $nomor = 1;
                                        while($h = mysql_fetch_array($q))
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td><?php echo $nomor++?></td>
                                                    <td><?php echo $h['nama_guru']?></td>
                                                    <td><?php echo $h['kode_login']?></td>
                                                    <td>
                                                        <a href="guru_daftar_login_form.php?id_guru=<?php echo $h['id_guru']?>" class="btn btn-info"><span class="fa fa-edit"></span> VIEW AND EDIT</a>
                                                        <a href="guru_daftar_login_email.php?id_guru=<?php echo $h['id_guru']?>" onclick="return confirm('Yakin mau me-reset password dan mengirimkannya ke email guru?')" class="btn btn-danger"><span class="fa fa-key"></span> RESET PASSWORD</a>
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