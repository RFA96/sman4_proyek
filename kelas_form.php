<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/29/17
 * Time: 18:46 PM
 */
    include "koneksi.php";
    $method = $_GET['method'];
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>FORM KELAS</title>
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
                        <a href="kelas_index.php">Kelas</a>
                    </li>
                    <li class="breadcrumb-item active">Form</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method == "create")
                            {
                                ?>
                                    <h1>Tambah Data Kelas</h1>
                                    <hr>
                                    <form method="post" action="kelas_proses.php?crud=create">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Contoh: X MIPA 1, XI IIS 3" name="kelas">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-7">
                                                <select name="jurusan" class="form-control">
                                                    <option value="NULL">----- Pilih Salah Satu -----</option>
                                                    <option value="MIPA">MIPA</option>
                                                    <option value="IIS">IIS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="kelas_index.php" class="btn btn-danger" onclick="return confirm('Yakin batal input data?')"><span class="fa fa-arrow-left"></span> BACK</a>
                                        </center>
                                    </form>
                                <?php
                            }
                            else
                            {
                                $kode = $_GET['kode_kelas'];
                                $query = mysql_query("SELECT * FROM kelas WHERE kode_kelas = $kode");
                                $data = mysql_fetch_assoc($query);
                                ?>
                                    <h1>Edit Data Kelas</h1>
                                    <hr>
                                    <form method="post" action="kelas_proses.php?crud=edit&kode_kelas=<?php echo $kode?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" placeholder="Contoh: X MIPA 1, XI IIS 3" name="kelas" value="<?php echo $data['kelas'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-7">
                                                <select name="jurusan" class="form-control">
                                                    <option value="NULL">----- Pilih Salah Satu -----</option>
                                                    <option <?php if($data['jurusan'] == 'MIPA'):?> selected="selected" <?php endif;?> value="MIPA">MIPA</option>
                                                    <option <?php if($data['jurusan'] == 'IIS'):?> selected="selected" <?php endif;?> value="IIS">IIS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="kelas_index.php" class="btn btn-danger" onclick="return confirm('Yakin batal input data?')"><span class="fa fa-arrow-left"></span> BACK</a>
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