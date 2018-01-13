<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/4/18
 * Time: 07:26 AM
 */
    include "koneksi.php";
    $id_siswa = $_GET['id_siswa'];
    $method = $_GET['method'];
    $qSIswa = mysql_query("SELECT nama_siswa FROM siswa WHERE id_siswa = $id_siswa");
    $fSiswa = mysql_fetch_assoc($qSIswa);
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>FORM SET KELAS</title>
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
                    <li class="breadcrumb-item">
                        <a href="siswa_index.php">Daftar Siswa</a>
                    </li>
                    <li class="breadcrumb-item active">Set Kelas</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method == "create")
                            {
                                ?>
                                    <h1>Set Penempatan Kelas</h1>
                                    <hr>
                                    <form method="post" action="setkelas_proses.php?crud=create">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                            <div class="col-sm-7">
                                                <input type="hidden" name="id_siswa" value="<?php echo $id_siswa?>">
                                                <input type="text" class="form-control" readonly value="<?php echo $fSiswa['nama_siswa']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="kode_kelas">
                                                    <option value="NULL">----- Pilih Salah Satu -----</option>
                                                    <?php
                                                        $qKelas = mysql_query("SELECT kode_kelas, kelas FROM kelas");
                                                        while($fKelas = mysql_fetch_assoc($qKelas))
                                                        {
                                                            ?>
                                                                <option value="<?php echo $fKelas['kode_kelas']?>"><?php echo $fKelas['kelas']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin mau menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="siswa_index.php" class="btn btn-danger" onclick="return confirm('Yakin membatalkan input data?')"><span class="fa fa-arrow-left"></span> CANCEL</a>
                                        </center>
                                    </form>
                                <?php
                            }
                            else
                            {
                                ?>

                                <?php
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>
        <?php include "materials_js.php";?>
    </body>
</html>