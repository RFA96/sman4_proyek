<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/28/17
 * Time: 17:35 PM
 */
    include "koneksi.php";
    $id = $_GET['id_guru'];
    $q_guru = mysql_query("SELECT * FROM guru WHERE id_guru = $id");
    $f_guru = mysql_fetch_assoc($q_guru);
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>VIEW AND EDIT LOGIN GURU</title>
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
                        <a href="guru_index.php">Guru</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="guru_daftar_login.php">Daftar Login Guru</a>
                    </li>
                    <li class="breadcrumb-item active">View and Edit</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>View dan Edit Login Guru</h1>
                        <hr>
                        <form method="post" action="guru_daftar_login_proses.php">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Login</label>
                                <div class="col-sm-7">
                                    <input type="hidden" name="id_guru" value="<?php echo $f_guru['id_guru'];?>">
                                    <input type="text" class="form-control" name="kode_login" value="<?php echo $f_guru['kode_login']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $f_guru['password']?>">
                                    <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Tampilkan <i>Password</i>
                                </div>
                            </div>
                            <hr>
                            <center>
                                <button type="submit" class="btn btn-lg btn-primary" onclick="return confirm('Yakin menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                <a href="guru_daftar_login.php" class="btn btn-lg btn-danger" onclick="return confirm('Yakin membatalkan input data ini?')"><span class="fa fa-times"></span> CANCEL</a>
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