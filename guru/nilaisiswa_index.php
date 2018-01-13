<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/4/18
 * Time: 12:12 PM
 */
    include "../koneksi.php";
    $kode_kelas = $_GET['kode_kelas'];
    $id_siswa = $_GET['id_siswa'];
    $kode_mapel = $_GET['kode_mapel'];
    $id_guru = $_GET['id_guru'];

    $qKelas = mysql_query("SELECT * FROM kelas WHERE kode_kelas = $kode_kelas");
    $fKelas = mysql_fetch_assoc($qKelas);

    $qSiswa = mysql_query("SELECT nisn, nama_siswa, jenis_kelamin FROM siswa WHERE id_siswa = $id_siswa");
    $fSiswa = mysql_fetch_assoc($qSiswa);
?>
<html>
    <head>
        <?php include "materials_css.php"?>
        <title>HALAMAN UTAMA</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php";?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Kelas</li>
                    <li class="breadcrumb-item">
                        <a href="kelas_index.php?kode_kelas=<?php echo $kode_kelas?>">
                            <?php echo $fKelas['kelas']?>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><?php echo $fSiswa['nama_siswa']?></li>
                    <li class="breadcrumb-item active">Olah Nilai</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <div class="card">
                            <div class="card-header"><strong>A. Data Siswa</strong></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <td><strong>NIS</strong></td>
                                                <td align="center">:</td>
                                                <td><?php echo $fSiswa['nisn']?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Lengkap</strong></td>
                                                <td align="center">:</td>
                                                <td><?php echo $fSiswa['nama_siswa']?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Jenis Kelamin</strong></td>
                                                <td align="center">:</td>
                                                <td><?php echo $fSiswa['jenis_kelamin']?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div
                        </div>
                    </div><br>
                    <?php
                        $qNilai = "SELECT * FROM nilai WHERE id_siswa = $id_siswa AND kode_mapel = $kode_mapel AND id_guru = $id_guru AND kode_kelas = $kode_kelas";
                        $rNilai = mysql_query($qNilai);
                        $fNilai = mysql_fetch_assoc($rNilai);
                    ?>
                    <div class="card">
                        <div class="card-header"><strong>B. Data Nilai Pengetahuan</strong></div>
                        <div class="card-body">
                            <p>Klik pada nilai untuk meng-<i>edit</i> nilai</p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Nilai 1</th>
                                        <th>Nilai 2</th>
                                        <th>Nilai 3</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai 4</th>
                                        <th>Nilai 5</th>
                                        <th>Nilai 6</th>
                                        <th>Nilai UAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($fNilai['id_nilai'] == null)
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td colspan="8">
                                                        <a href="inisialisasi_nilai.php?id_siswa=<?php echo $id_siswa?>&id_guru=<?php echo $id_guru?>&kode_mapel=<?php echo $kode_mapel?>&kode_kelas=<?php echo $kode_kelas?>&id_tahun_akademik=<?php echo $tahun_akademik?>" class="btn btn-primary"><span class="fa fa-plus"></span> INPUT NILAI</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_1', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_1']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_2', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_2']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_3', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_3']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_uts', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_uts']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_4', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_4']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_5', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_5']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_6', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_6']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_uas', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_uas']?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tr align="center">
                                    <th>Nilai Angka Rata</th>
                                    <th>Nilai Huruf</th>
                                </tr>
                                <tr align="center">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div><br>
                    <div class="card">
                        <div class="card-header"><strong>C. Data Nilai Keterampilan</strong></div>
                        <div class="card-body">
                            <p>Klik pada nilai untuk meng-<i>edit</i> nilai</p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Nilai 1</th>
                                        <th>Nilai 2</th>
                                        <th>Nilai 3</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai 4</th>
                                        <th>Nilai 5</th>
                                        <th>Nilai 6</th>
                                        <th>Nilai UAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($fNilai['id_nilai'] == null)
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td colspan="8">Silahkan klik INPUT NILAI</td>
                                                </tr>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_keterampilan_1', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_keterampilan_1']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_keterampilan_2', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_keterampilan_2']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_keterampilan_3', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_keterampilan_3']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_uts_keterampilan', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_uts_keterampilan']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_keterampilan_4', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_keterampilan_4']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_keterampilan_5', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_keterampilan_5']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_keterampilan_6', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_keterampilan_6']?></td>
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'nilai_uas_keterampilan', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['nilai_uas_keterampilan']?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div><br>
                    <div class="card">
                        <div class="card-header"><strong>D. Sikap Sosial dan Spiritual Dalam Mata Pelajaran</strong></div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Catatan di sini</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($fNilai['id_nilai'] == null)
                                        {
                                            ?>
                                                <tr align="center">
                                                    <td colspan="8">Silahkan klik INPUT NILAI</td>
                                                </tr>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <tr align="justify">
                                                    <td contenteditable="true" onblur="saveToDatabasePengetahuan(this, 'sikap_dalam_mapel', '<?php echo $fNilai['id_nilai']?>')" onclick="showEditPengetahuan(this)"><?php echo $fNilai['sikap_dalam_mapel']?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "materials_js.php"?>
        <?php include "../footer.php"?>
        <script>
            function showEditPengetahuan(editableObj)
            {
                $(editableObj).css("background","#FFF");
            }

            function saveToDatabasePengetahuan(editableObj, column, id)
            {
                $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
                $.ajax({
                    url: "saveedit_nilaipengetahuan.php",
                    type: "POST",
                    data: "column="+column+"&editval="+editableObj.innerHTML+"&id="+id,
                    success: function (data) {
                        $(editableObj).css("background", "#80ffaa");
                    }
                });
            }
        </script>
    </body>
</html>