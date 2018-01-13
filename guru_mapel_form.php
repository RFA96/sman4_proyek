<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/1/18
 * Time: 17:00 PM
 */
    include "koneksi.php";
    $method = $_GET['method'];
    $id = $_GET['id_guru'];
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>SET MATA PELAJARAN</title>
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
                        <a href="guru_index.php">Guru</a></li>
                    <li class="breadcrumb-item active">Set Mata Pelajaran</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method == "create")
                            {
                                ?>
                                    <h1>Set Mata Pelajaran</h1>
                                    <hr>
                                    <form method="post" action="guru_mapel_proses.php?crud=create">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Guru</label>
                                            <div class="col-sm-7">
                                                <?php
                                                    $qGuru = mysql_query("SELECT * FROM guru WHERE id_guru = $id");
                                                    $fGuru = mysql_fetch_assoc($qGuru);
                                                ?>
                                                <input type="text" class="form-control" value="<?php echo $fGuru['nama_guru']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Program Studi Guru</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" value="<?php echo $fGuru['program_studi_guru']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                            <div class="col-sm-7">
                                                <input type="hidden" name="id_guru" value="<?php echo $id?>"/>
                                                <select name="kode_mapel" class="form-control">
                                                    <option value="<?php echo null?>">----- Pilih salah satu -----</option>
                                                    <?php
                                                        $qMapel = mysql_query("SELECT * FROM mata_pelajaran");
                                                        while($fMapel = mysql_fetch_assoc($qMapel))
                                                        {
                                                            ?>
                                                                <option value="<?php echo $fMapel['kode_mapel']?>"><?php echo $fMapel['mata_pelajaran']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin mau menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="guru_index.php" class="btn btn-danger" onclick="return confirm('Yakin membatalkan input data?')"><span class="fa fa-arrow-left"></span> CANCEL</a>
                                        </center>
                                    </form>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <h1>Edit Mata Pelajaran</h1>
                                    <hr>
                                    <form method="post" action="guru_mapel_proses.php?crud=edit&id_guru=<?php echo $id?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Guru</label>
                                            <div class="col-sm-7">
                                                <?php
                                                    $qGuru = mysql_query("SELECT * FROM guru WHERE id_guru = $id");
                                                    $fGuru = mysql_fetch_assoc($qGuru);
                                                ?>
                                                <input type="text" class="form-control" value="<?php echo $fGuru['nama_guru']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Program Studi Guru</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" value="<?php echo $fGuru['program_studi_guru']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                            <div class="col-sm-7">
                                                <?php
                                                    $qA = mysql_query("SELECT * FROM mengajar WHERE id_guru = $id"); $fA = mysql_fetch_assoc($qA);
                                                    $qB = mysql_query("SELECT * FROM mata_pelajaran WHERE kode_mapel = ".$fA['kode_mapel']); $fB = mysql_fetch_assoc($qB);
                                                ?>
                                                <select class="form-control" name="kode_mapel">
                                                    <option value="<?php echo null?>">----- Pilih salah satu -----</option>
                                                    <?php
                                                        $qMapel = mysql_query("SELECT * FROM mata_pelajaran");
                                                        while($fMapel = mysql_fetch_assoc($qMapel))
                                                        {
                                                            ?>
                                                                <option <?php if($fA['kode_mapel'] == $fMapel['kode_mapel']):?> selected="selected" <?php endif;?> value="<?php echo $fMapel['kode_mapel']?>"><?php echo $fMapel['mata_pelajaran']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin mau menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="guru_index.php" class="btn btn-danger" onclick="return confirm('Yakin membatalkan input data?')"><span class="fa fa-arrow-left"></span> CANCEL</a>
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