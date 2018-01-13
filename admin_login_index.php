<?php
/**
 * Created by PhpStorm.
 * User: Raka_Matsukaze
 * Date: 11/27/17
 * Time: 00:00
 */
    include "koneksi.php";
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>DAFTAR LOGIN ADMIN</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php";?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Daftar Login Admin</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Daftar <i>Login Admin</i></h1>
                        <hr>
                        <a href="admin_login_form.php?method=create" class="btn btn-primary" style="margin-bottom: 20px"><span class="fa fa-plus"></span> TAMBAH DATA ADMIN</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>Nama User</th>
                                        <th><i>Username</i></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = mysql_query("SELECT * FROM login");
                                        $nomor = 1;
                                        while($h = mysql_fetch_assoc($q))
                                        {
                                            if($h['jabatan'] == "Admin")
                                            {
                                                ?>
                                                    <tr align="center">
                                                        <td><?php echo $nomor++;?></td>
                                                        <td><?php echo $h['nama_user']?></td>
                                                        <td><?php echo $h['username']?></td>
                                                        <td>
                                                            <a href="admin_login_form.php?method=edit&id=<?php echo $h['id']?>" class="btn btn-info"><span class="fa fa-edit"></span> EDIT</a>
                                                            <a href="admin_login_proses.php?crud=delete&id=<?php echo $h['id']?>" class="btn btn-danger" onclick="return confirm('Yakin mau hapus data ini?')"><span class="fa fa-trash"></span> DELETE</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
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