<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/20/17
 * Time: 3:52 PM
 */
    include "koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>DAFTAR LOGIN SISWA</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="admin_index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Siswa</li>
                    <li class="breadcrumb-item active">Daftar Login Siswa</li>
                </ol>
                <?php
                    error_reporting(0);
                    $sukses = $_GET['sukses'];
                    if($sukses == 1)
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> Pesan berhasil dikirimkan ke alamat <i>email</i> siswa.
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
                                <strong>Berhasil!</strong> Data berhasil diubah.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    }
                ?>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar Login Siswa</h1>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Kode Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysql_query("SELECT id_siswa, nama_siswa, kode_login FROM siswa ORDER BY nama_siswa ASC");
                                        $nomor = 1;
                                        while($h = mysql_fetch_array($q))
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td><?php echo $nomor++;?></td>
                                                    <td><?php echo $h['nama_siswa']?></td>
                                                    <td><?php echo $h['kode_login']?></td>
                                                    <td>
                                                        <a href="siswa_daftar_login_form.php?id_siswa=<?php echo $h['id_siswa']?>" class="btn btn-info"><span class="fa fa-edit"></span> VIEW AND EDIT</a>
                                                        <a href="siswa_daftar_login_email.php?id_siswa=<?php echo $h['id_siswa']?>" onclick="return confirm('Yakin mau me-reset password dan mengirimkannya ke email siswa?')" class="btn btn-danger"><span class="fa fa-key"></span> RESET PASSWORD</a>
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