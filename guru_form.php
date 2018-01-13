<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/25/17
 * Time: 11:37 PM
 */
    include "koneksi.php";
    $method = $_GET['method'];

    //Kode acak
    $angkaAcak = rand(00000000,99999999);
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title>FORM GURU</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="admin_index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="guru_index.php">Guru</a>
                    </li>
                    <li class="breadcrumb-item active">Form</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method == "create")
                            {
                                ?>
                                    <h1>Tambah Data Guru</h1>
                                    <hr>
                                    <form method="post" action="guru_proses.php?crud=create">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>A. Data Guru</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">NIP</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="18" class="form-control" name="nip_guru">
                                                        <input type="hidden" value="<?php echo $angkaAcak?>" name="kode_login">
                                                        <input type="hidden" value="password" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="nama_guru" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-7">
                                                        <select name="jenis_kelamin" class="form-control">
                                                            <option value="NULL">----- Pilih Salah Satu -----</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="tempat_lahir" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tanggal_lahir" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_guru"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Telepon</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" name="telepon_guru" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" name="email_guru" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="golongan_darah">
                                                            <option value="NULL">----- Pilih Salah Satu -----</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="AB">AB</option>
                                                            <option value="O">O</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Agama</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="agama">
                                                            <option value="NULL">----- Pilih Salah Satu -----</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Katolik">Katolik</option>
                                                            <option value="Protestan">Protestan</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Buddha">Buddha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>B. Data Pendidikan</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="pendidikan">
                                                            <option value="NULL">-----Pilih salah satu-----</option>
                                                            <option value="D1">D1</option>
                                                            <option value="D2">D2</option>
                                                            <option value="D3">D3</option>
                                                            <option value="D4">D4</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Program Studi / Jurusan</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="program_studi_guru" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tanggal_masuk" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Keluar</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tanggal_keluar" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <center>
                                            <button class="btn btn-primary" onclick="return confirm('Yakin mau menyimpan data ini?')"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="guru_index.php" class="btn btn-danger" onclick="return confirm('Yakin membatalkan input data?')"><span class="fa fa-arrow-left"></span> CANCEL</a>
                                        </center>
                                    </form>
                                <?php
                            }
                            else
                            {
                                $id = $_GET['id_guru'];
                                $qGuru = mysql_query("SELECT * FROM guru WHERE id_guru = $id");
                                $fGuru = mysql_fetch_assoc($qGuru);
                                ?>
                                    <h1>Edit Data Guru</h1>
                                    <hr>
                                    <form method="post" action="guru_proses.php?crud=edit&id_guru=<?php echo $id?>">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>A. Data Guru</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">NIP</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="18" class="form-control" name="nip_guru" value="<?php echo $fGuru['nip_guru']?>">
                                                        <input type="hidden" value="<?php echo $fGuru['kode_login']?>" name="kode_login">
                                                        <input type="hidden" value="<?php echo $fGuru['password']?>" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="nama_guru" class="form-control" value="<?php echo $fGuru['nama_guru']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-7">
                                                        <select name="jenis_kelamin" class="form-control">
                                                            <option value="NULL">----- Pilih Salah Satu -----</option>
                                                            <option <?php if($fGuru['jenis_kelamin'] == 'Laki-Laki'):?> selected="selected" <?php endif;?> value="Laki-Laki">Laki-Laki</option>
                                                            <option <?php if($fGuru['jenis_kelamin'] == 'Perempuan'):?> selected="selected" <?php endif;?> value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $fGuru['tempat_lahir']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $fGuru['tanggal_lahir']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_guru"><?php echo $fGuru['alamat_guru']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Telepon</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" name="telepon_guru" class="form-control" value="<?php echo $fGuru['telepon_guru']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" name="email_guru" class="form-control" value="<?php echo $fGuru['email_guru']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="golongan_darah">
                                                            <option value="NULL">----- Pilih Salah Satu -----</option>
                                                            <option <?php if($fGuru['golongan_darah'] == 'A'):?> selected="selected" <?php endif;?> value="A">A</option>
                                                            <option <?php if($fGuru['golongan_darah'] == 'B'):?> selected="selected" <?php endif;?> value="B">B</option>
                                                            <option <?php if($fGuru['golongan_darah'] == 'AB'):?> selected="selected" <?php endif;?> value="AB">AB</option>
                                                            <option <?php if($fGuru['golongan_darah'] == 'O'):?> selected="selected" <?php endif;?> value="O">O</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Agama</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="agama">
                                                            <option value="NULL">----- Pilih Salah Satu -----</option>
                                                            <option <?php if($fGuru['agama'] == 'Islam'):?> selected="selected" <?php endif;?> value="Islam">Islam</option>
                                                            <option <?php if($fGuru['agama'] == 'Katolik'):?> selected="selected" <?php endif;?> value="Katolik">Katolik</option>
                                                            <option <?php if($fGuru['agama'] == 'Protestan'):?> selected="selected" <?php endif;?> value="Protestan">Protestan</option>
                                                            <option <?php if($fGuru['agama'] == 'Hindu'):?> selected="selected" <?php endif;?> value="Hindu">Hindu</option>
                                                            <option <?php if($fGuru['agama'] == 'Buddha'):?> selected="selected" <?php endif;?> value="Buddha">Buddha</option>
                                                            <option <?php if($fGuru['agama'] == 'Konghucu'):?> selected="selected" <?php endif;?> value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>B. Data Pendidikan</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="pendidikan">
                                                            <option value="NULL">-----Pilih salah satu-----</option>
                                                            <option <?php if($fGuru['pendidikan'] == 'D1'):?> selected="selected" <?php endif;?> value="D1">D1</option>
                                                            <option <?php if($fGuru['pendidikan'] == 'D2'):?> selected="selected" <?php endif;?> value="D2">D2</option>
                                                            <option <?php if($fGuru['pendidikan'] == 'D3'):?> selected="selected" <?php endif;?> value="D3">D3</option>
                                                            <option <?php if($fGuru['pendidikan'] == 'D4'):?> selected="selected" <?php endif;?> value="D4">D4</option>
                                                            <option <?php if($fGuru['pendidikan'] == 'S1'):?> selected="selected" <?php endif;?> value="S1">S1</option>
                                                            <option <?php if($fGuru['pendidikan'] == 'S2'):?> selected="selected" <?php endif;?> value="S2">S2</option>
                                                            <option <?php if($fGuru['pendidikan'] == 'S3'):?> selected="selected" <?php endif;?> value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Program Studi / Jurusan</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="program_studi_guru" class="form-control" value="<?php echo $fGuru['program_studi_guru']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $fGuru['tanggal_masuk']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Keluar</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="tanggal_keluar" class="form-control" value="<?php echo $fGuru['tanggal_keluar']?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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