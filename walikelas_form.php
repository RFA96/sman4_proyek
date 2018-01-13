<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/30/17
 * Time: 15:42 PM
 */
    include "koneksi.php";
    $kodeKelas = $_GET['kode_kelas'];
    $q = mysql_query("SELECT kelas, kode_kelas FROM kelas WHERE kode_kelas = $kodeKelas");
    $f = mysql_fetch_assoc($q);
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>WALI KELAS</title>
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
                    <li class="breadcrumb-item active">Set Wali Kelas</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method = "create")
                            {
                                ?>
                                <h1>Set Wali Kelas <?php echo $f['kelas']?></h1>
                                <hr>
                                <?php
                                    $error = $_GET['error'];
                                    if($error == 1)
                                    {
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Gagal!</strong> Wali kelas sudah ada di kelas lainnya. Pilih guru lain!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <form method="post" action="walikelas_proses.php?crud=create&kode=<?php echo $kodeKelas?>&tahun_akademik=<?php echo $tahun_akademik?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Guru</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="guru" list="daftarGuru" data-min-length="1"/>
                                        </div>
                                    </div>
                                    <hr>
                                    <center>
                                        <button class="btn btn-primary" onclick="return confirm('Yakin menginputkan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                    </center>
                                </form>
                                <?php
                            }
                            else
                            {
                                ?><?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>
        <?php include "materials_js.php";?>
        <datalist id="daftarGuru">
            <?php
                $q = mysql_query("SELECT id_guru, nama_guru FROM guru");
                while($h = mysql_fetch_assoc($q))
                {
                    ?>
                    <option value="<?php echo $h['id_guru']?>"><?php echo $h['nama_guru']?></option>
                    <?php
                }
            ?>
        </datalist>
    </body>
</html>