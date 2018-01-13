<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/1/18
 * Time: 09:29 AM
 */
    include "koneksi.php";
    $method = $_GET['method'];
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>FORM MATA PELAJARAN</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="mapel_index.php">Mata Pelajaran</a>
                    </li>
                    <li class="breadcrumb-item active">Form</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method == "create")
                            {
                                ?>
                                    <h1>Tambah Data Mata Pelajaran</h1>
                                    <hr>
                                    <form method="post" action="mapel_proses.php?crud=create">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="mata_pelajaran">
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="mapel_index.php" class="btn btn-danger" onclick="return confirm('Yakin batal input data?')"><span class="fa fa-arrow-left"></span> BACK</a>
                                        </center>
                                    </form>
                                <?php
                            }
                            else
                            {
                                $kode = $_GET['kode_mapel'];
                                $query = mysql_query("SELECT * FROM mata_pelajaran WHERE kode_mapel = $kode");
                                $data = mysql_fetch_assoc($query);
                                ?>
                                    <h1>Tambah Data Mata Pelajaran</h1>
                                    <hr>
                                    <form method="post" action="mapel_proses.php?crud=edit&kode_mapel=<?php echo $kode?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="mata_pelajaran" value="<?php echo $data['mata_pelajaran'];?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="mapel_index.php" class="btn btn-danger" onclick="return confirm('Yakin batal input data?')"><span class="fa fa-arrow-left"></span> BACK</a>
                                        </center>
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
    </body>
</html>
