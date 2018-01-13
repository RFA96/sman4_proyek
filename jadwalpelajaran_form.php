<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/1/18
 * Time: 14:13 PM
 */
    include "koneksi.php";
    $method = $_GET['method'];
    $kode_kelas = $_GET['kode_kelas'];
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>FORM JADWAL PELAJARAN</title>
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
                    <li class="breadcrumb-item">
                        <a href="jadwalpelajaran_index.php?kode_kelas=<?php echo $kode_kelas?>">Jadwal Pelajaran</a>
                    </li>
                    <li class="breadcrumb-item active">Form</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <h1>Tambah Jadwal Pelajaran</h1>
                        <hr>
                        <form method="post" action="jadwalpelajaran_proses.php?crud=create">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tahun Ajaran | Semester</label>
                                <div class="col-sm-7">
                                    <?php
                                        $qTA = mysql_query("SELECT * FROM tahun_akademik WHERE id_tahun_akademik = $tahun_akademik");
                                        $fTA = mysql_fetch_assoc($qTA);
                                        if($fTA['semester'] == 1)
                                        {
                                            $semester = "Ganjil";
                                        }
                                        else
                                        {
                                            $semester = "Genap";
                                        }
                                    ?>
                                    <input type="hidden" name="id_tahun_akademik" value="<?php echo $tahun_akademik?>"/>
                                    <input type="text" class="form-control" value="<?php echo $fTA['tahun_akademik']." ".$semester?>" readonly/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hari</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="hari">
                                        <option value="NULL">----- Pilih Hari -----</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jam</label>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" name="jam_mulai"/>
                                </div>s/d
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" name="jam_selesai"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-7">
                                    <select name="kode_mapel" class="form-control" id="kode_mapel">
                                        <option value="NULL">----- Pilih Mata Pelajaran -----</option>
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pengajar</label>
                                <div class="col-sm-7">
                                    <select name="id_guru" class="form-control" id="id_guru">
                                        <option value="NULL">Pilih mata pelajaran terlebih dahulu</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="kode_kelas" value="<?php echo $kode_kelas?>">
                            <hr>
                            <center>
                                <button type="submit" class="btn btn-lg btn-primary" onclick="return confirm('Yakin menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                <a href="jadwalpelajaran_index.php?kode_kelas=<?php echo $kode_kelas?>" class="btn btn-lg btn-danger" onclick="return confirm('Yakin membatalkan input data ini?')"><span class="fa fa-times"></span> CANCEL</a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>
        <?php include "materials_js.php";?>
        <script>
            $(document).ready(function () {
                $('#kode_mapel').change(function () {
                    var kode_mapel = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: "get_guru.php",
                        data: "kode_mapel="+kode_mapel,
                        success: function (response) {
                            $('#id_guru').html(response);
                        }
                    })
                })
            })
        </script>
    </body>
</html>