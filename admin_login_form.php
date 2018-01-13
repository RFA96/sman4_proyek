<?php
/**
 * Created by PhpStorm.
 * User: Raka_Matsukaze
 * Date: 11/30/17
 * Time: 23:48
 */
    include "koneksi.php";
    $method = $_GET['method'];
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title><?php if($method == "create"){echo "Tambah";}else{echo "Edit";}?> User</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php";?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="admin_login_index.php">Admin and Login</a>
                    </li>
                    <li class="breadcrumb-item active">Form</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method == "create")
                            {
                                ?>
                                    <h1>Tambah Data</h1>
                                    <hr>
                                        <form method="post" action="admin_login_proses.php?crud=create">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama User</label>
                                                <div class="col-sm-7">
                                                    <input type="text" maxlength="15" class="form-control" placeholder="Nama User..." name="nama_user">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-7">
                                                    <input type="text" maxlength="15" class="form-control" placeholder="Username..." name="username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-7">
                                                    <input type="password" maxlength="10" class="form-control" placeholder="Password..." name="password">
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-lg btn-info"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="admin_login_index.php" class="btn btn-lg btn-danger"><span class="fa fa-times"></span> CANCEL</a>
                                        </form>
                                <?php
                            }
                            else
                            {
                                $id = $_GET['id'];
                                $query = mysql_query("SELECT * FROM login WHERE id = $id");
                                $data = mysql_fetch_array($query);
                                ?>
                                    <h1>Edit Data</h1>
                                    <hr>
                                    <form method="post" action="admin_login_proses.php?crud=edit&id=<?php echo $id?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-7">
                                                <input type="text" maxlength="15" class="form-control" placeholder="Username..." name="username" value="<?php echo $data['username']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-7">
                                                <input type="password" maxlength="10" class="form-control" placeholder="Password..." name="password" value="<?php echo $data['password']?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-lg btn-info"><span class="fa fa-download"></span> SAVE</button>
                                        <a href="admin_login_index.php" class="btn btn-lg btn-danger"><span class="fa fa-times"></span> CANCEL</a>
                                    </form>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>
        <?php include "materials_js.php";?>
        <script>
            $(document).ready(function () {
                $('#jabatan').on('change', function () {
                    if(this.value == 'Guru')
                    {
                        document.getElementById('id_guru').disabled = false;
                        document.getElementById('id_siswa').disabled = true;
                    }
                    else if(this.value == 'Siswa')
                    {
                        document.getElementById('id_siswa').disabled = false;
                        document.getElementById('id_guru').disabled = true;
                    }
                    else
                    {
                        document.getElementById('id_guru').disabled = true;
                        document.getElementById('id_siswa').disabled = true;
                    }
                })
            });
        </script>
    </body>
</html>