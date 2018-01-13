<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/2/18
 * Time: 18:38 PM
 */
    include "../koneksi.php";
    error_reporting(0);
    $error = $_GET['error'];
?>
<html>
    <head>
        <title>LOGIN PAGE</title>
        <?php include "materials_css.php";?>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header" align="center"><strong>Teacher Login</strong></div>
                <div class="card-body">
                    <?php
                    if($error == 1)
                    {
                        ?>
                        <div class="alert alert-danger">Username or Password is wrong. Try Again!</div>
                        <form method="post" action="login_proses.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input class="form-control" type="text" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Akademik</label>
                                <select class="form-control" name="tahun_akademik">
                                    <option>----- Pilih Salah Satu ------</option>
                                    <?php
                                        $qTA = mysql_query("SELECT * FROM tahun_akademik");
                                        while($fTA = mysql_fetch_assoc($qTA))
                                        {
                                            if($fTA['semester'] == 1)
                                            {
                                                $semester = "Ganjil";
                                            }
                                            else
                                            {
                                                $semester = "Genap";
                                            }
                                            ?>
                                                <option value="<?php echo $fTA['id_tahun_akademik']?>"><?php echo $fTA['tahun_akademik']." ".$semester?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block">Login</button>
                        </form>
                        <?php
                    }
                    else
                    {
                        ?>
                        <form method="post" action="login_proses.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input class="form-control" type="text" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Akademik</label>
                                <select class="form-control" name="tahun_akademik">
                                    <option>----- Pilih Salah Satu ------</option>
                                    <?php
                                        $qTA = mysql_query("SELECT * FROM tahun_akademik");
                                        while($fTA = mysql_fetch_assoc($qTA))
                                        {
                                            if($fTA['semester'] == 1)
                                            {
                                                $semester = "Ganjil";
                                            }
                                            else
                                            {
                                                $semester = "Genap";
                                            }
                                            ?>
                                                <option value="<?php echo $fTA['id_tahun_akademik']?>"><?php echo $fTA['tahun_akademik']." ".$semester?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block">Login</button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
