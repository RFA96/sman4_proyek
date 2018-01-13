<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/1/18
 * Time: 10:26 AM
 */
    error_reporting(0);
    include "koneksi.php";
    $kode_kelas = $_GET['kode_kelas'];
    $qKelas = mysql_query("SELECT kelas FROM kelas WHERE kode_kelas = $kode_kelas");
    $fKelas = mysql_fetch_assoc($qKelas);
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>JADWAL PELAJARAN KELAS <?php echo strtoupper($fKelas['kelas']);?> </title>
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
                        <a href="kelas_index.php">Kelas</a>
                    </li>
                    <li class="breadcrumb-item active">Jadwal Pelajaran</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            $sukses = $_GET['sukses'];
                            if($sukses == 1)
                            {
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> Data jadwal berhasil dihapus.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
                            }
                            else if($sukses == 2)
                            {
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> Data jadwal berhasil ditambah
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
                            }
                            else if($sukses == 3)
                            {
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> <?php echo $_SESSION['errMsg']; unset($_SESSION['errMsg'])?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
                            }
                            else if($sukses == 4)
                            {
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> Data jadwal berhasil diubah
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
                            }
                        ?>
                        <h1>Jadwal Pelajaran Kelas <?php echo $fKelas['kelas']?></h1>
                        <hr>
                        <a href="jadwalpelajaran_form.php?method=create&kode_kelas=<?php echo $kode_kelas?>&tahun_akademik=<?php echo $tahun_akademik?>" class="btn btn-primary" style="margin-bottom: 20px"><span class="fa fa-plus"></span> TAMBAH JADWAL</a>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-senin-tab" data-toggle="pill" href="#pills-senin" role="tab" aria-controls="pills-senin" aria-selected="true">Senin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-selasa-tab" data-toggle="pill" href="#pills-selasa" role="tab" aria-controls="pills-selasa" aria-selected="false">Selasa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-rabu-tab" data-toggle="pill" href="#pills-rabu" role="tab" aria-controls="pills-rabu" aria-selected="false">Rabu</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-senin" role="tabpanel" aria-labelledby="pills-senin-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="display" cellspacing="0" width="100%">
                                        <thead>
                                            <tr align="center" style="font-weight: bold">
                                                <td>No.</td>
                                                <td>Jam</td>
                                                <td>Mata Pelajaran</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr align="center">
                                                <td>1</td>
                                                <td>06:45 - 07:45</td>
                                                <td>Upacara Bendera</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                                $qJadwal = mysql_query("SELECT hari, jam, pelajaran.mata_pelajaran, g.nama_guru FROM jadwal j INNER JOIN mata_pelajaran pelajaran ON j.kode_mapel = pelajaran.kode_mapel INNER JOIN guru g ON j.id_guru = g.id_guru INNER JOIN kelas k ON j.kode_kelas = k.kode_kelas WHERE k.kode_kelas = $kode_kelas AND j.hari = 'Senin' AND j.id_tahun_akademik = $tahun_akademik");
                                                $nomor = 2;
                                                while($fJadwal = mysql_fetch_assoc($qJadwal))
                                                {
                                                    if($nomor == 3)
                                                    {
                                                        ?>
                                                            <tr align="center">
                                                                <td>3</td>
                                                                <td>10:00 - 10:15</td>
                                                                <td>Istirahat</td>
                                                                <td></td>
                                                            </tr>
                                                        <?php
                                                        $nomor++;
                                                    }
                                                    ?>
                                                        <tr align="center">
                                                            <td><?php echo $nomor++?></td>
                                                            <td><?php echo $fJadwal['jam']?></td>
                                                            <td><?php echo $fJadwal['mata_pelajaran'].' ('.$fJadwal['nama_guru'].')'?></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-selasa" role="tabpanel" aria-labelledby="pills-selasa-tab"><p>TEst</p></div>
                            <div class="tab-pane fade" id="pills-rabu" role="tabpanel" aria-labelledby="pills-rabu-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>
        <?php include "materials_js.php";?>
    </body>
</html>