<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/25/17
 * Time: 9:12 AM
 */
    include "koneksi.php";
    $id = $_GET['id_siswa'];
    $q_siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa = $id");
    $fetch_siswa = mysql_fetch_array($q_siswa);
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>VIEW AND EDIT LOGIN SISWA</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="siswa_index.php">Siswa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="siswa_daftar_login.php">Daftar Login Siswa</a>
                    </li>
                    <li class="breadcrumb-item active">View and Edit</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>View dan Edit Login Siswa</h1>
                        <hr>
                        <form method="post" action="siswa_daftar_login_proses.php">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Login</label>
                                <div class="col-sm-7">
                                    <input type="hidden" name="id_siswa" value="<?php echo $fetch_siswa['id_siswa'];?>">
                                    <input type="text" class="form-control" name="kode_login" value="<?php echo $fetch_siswa['kode_login']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $fetch_siswa['password']?>">
                                    <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Tampilkan <i>Password</i>
                                </div>
                            </div>
                            <hr>
                            <center>
                                <button type="submit" class="btn btn-lg btn-primary" onclick="return confirm('Yakin menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                <a href="siswa_daftar_login.php" class="btn btn-lg btn-danger" onclick="return confirm('Yakin membatalkan input data ini?')"><span class="fa fa-times"></span> CANCEL</a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>
        <?php include "materials_js.php";?>
    </body>
</html>
