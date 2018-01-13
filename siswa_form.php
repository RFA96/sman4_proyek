<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/13/17
 * Time: 3:26 PM
 */
    include "koneksi.php";
    $method = $_GET['method'];

    //Get automatic code
    $q_lastCode = mysql_query("SELECT kode_login FROM siswa ORDER BY id_siswa DESC LIMIT 1");
    $fetch_lastCode = mysql_fetch_array($q_lastCode);
    $lastCode = $fetch_lastCode['kode_login']+1;
?>
<html>
    <head>
        <?php include "materials_css.php";?>
        <title><?php if($method == "create"){echo "Tambah";}else{echo "Edit";}?> Siswa</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <?php include "navbar.php";?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="admin_index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="siswa_index.php">Siswa</a>
                    </li>
                    <li class="breadcrumb-item active">Form</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-sm-6 mb-3">
                        <?php
                            if($method == 'create')
                            {
                                ?>
                                    <h1>Tambah Data Siswa</h1>
                                    <hr>
                                    <form method="post" action="siswa_proses.php?crud=create">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>A. Data Siswa</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">NISN</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="10" class="form-control" name="nisn">
                                                        <input type="hidden" value="<?php echo $lastCode?>" name="kode_login">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_siswa">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="jenis_kelamin">
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Siswa</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_siswa" id="alamat_siswa"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" class="form-control" name="tempat_lahir">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control" name="tanggal_lahir">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="golongan_darah">
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
                                                            <option value="Islam">Islam</option>
                                                            <option value="Katolik">Katolik</option>
                                                            <option value="Protestan">Protestan</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Buddha">Buddha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email Siswa</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email_siswa">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Sekolah Asal</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_sekolah_asal">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Sekolah Asal</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" name="alamat_sekolah_asal"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tahun Angkatan</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="tahun_angkatan" value="<?php echo date('Y');?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Diterima Di Kelas</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="diterima_kelas">
                                                            <option name="X MIPA">X MIPA</option>
                                                            <option name="X IIS">X IIS</option>
                                                            <option name="XI MIPA">XI MIPA</option>
                                                            <option name="XI IIS">XI IIS</option>
                                                            <option name="XII MIPA">XII MIPA</option>
                                                            <option name="XII IIS">XII IIS</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Diterima Tanggal</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="diterima_tanggal" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>B. Data Orang Tua</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_ayah">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="pekerjaan_ayah">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Ibu</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_ibu">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="pekerjaan_ibu">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_ortu"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Telepon Orang Tua</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" class="form-control" name="telepon_ortu">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email Orang Tua</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email_ortu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>C. Data Wali</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_wali">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pekerjaan Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="pekerjaan_wali">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Wali</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_wali"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Telepon Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" class="form-control" name="telepon_wali">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email_wali">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <center>
                                            <button type="submit" onclick="return confirm('Yakin mau menambah data ini?')" class="btn btn-primary"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="siswa_index.php" onclick="return confirm('Yakin batal menambah data?')" class="btn btn-danger"><span class="fa fa-arrow-left"></span> CANCEL</a>
                                        </center>
                                    </form>
                                <?php
                            }
                            else
                            {
                                $id_siswa = $_GET['id_siswa'];
                                $q_siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa = $id_siswa");
                                $fetch_siswa = mysql_fetch_array($q_siswa);
                                ?>
                                    <h1>Edit Data Siswa</h1>
                                    <hr>
                                    <form method="post" action="siswa_proses.php?crud=edit&id_siswa=<?php echo $id_siswa?>">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>A. Data Siswa</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">NISN</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="10" class="form-control" name="nisn" readonly value="<?php echo $fetch_siswa['nisn']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_siswa" value="<?php echo $fetch_siswa['nama_siswa']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="jenis_kelamin">
                                                            <option <?php if($fetch_siswa['jenis_kelamin'] == 'Laki-Laki'):?> selected="selected" <?php endif;?> value="Laki-Laki">Laki-Laki</option>
                                                            <option <?php if($fetch_siswa['jenis_kelamin'] == 'Perempuan'):?> selected="selected" <?php endif;?> value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Siswa</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_siswa"><?php echo $fetch_siswa['alamat_siswa']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" class="form-control" name="tempat_lahir" value="<?php echo $fetch_siswa['tempat_lahir']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $fetch_siswa['tanggal_lahir']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="golongan_darah">
                                                            <option <?php if($fetch_siswa['golongan_darah'] == 'A'):?> selected="selected" <?php endif;?> value="A">A</option>
                                                            <option <?php if($fetch_siswa['golongan_darah'] == 'B'):?> selected="selected" <?php endif;?> value="B">B</option>
                                                            <option <?php if($fetch_siswa['golongan_darah'] == 'AB'):?> selected="selected" <?php endif;?> value="AB">AB</option>
                                                            <option <?php if($fetch_siswa['golongan_darah'] == 'O'):?> selected="selected" <?php endif;?> value="O">O</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Agama</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="agama">
                                                            <option <?php if($fetch_siswa['agama'] == 'Islam'):?> selected="selected" <?php endif;?> value="Islam">Islam</option>
                                                            <option <?php if($fetch_siswa['agama'] == 'Katolik'):?> selected="selected" <?php endif;?> value="Katolik">Katolik</option>
                                                            <option <?php if($fetch_siswa['agama'] == 'Protestan'):?> selected="selected" <?php endif;?> value="Protestan">Protestan</option>
                                                            <option <?php if($fetch_siswa['agama'] == 'Hindu'):?> selected="selected" <?php endif;?> value="Hindu">Hindu</option>
                                                            <option <?php if($fetch_siswa['agama'] == 'Buddha'):?> selected="selected" <?php endif;?> value="Buddha">Buddha</option>
                                                            <option <?php if($fetch_siswa['agama'] == 'Konghucu'):?> selected="selected" <?php endif;?> value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email Siswa</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email_siswa" value="<?php echo $fetch_siswa['email_siswa']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Sekolah Asal</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_sekolah_asal" value="<?php echo $fetch_siswa['nama_sekolah_asal']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Sekolah Asal</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" name="alamat_sekolah_asal" rows="3"><?php echo $fetch_siswa['alamat_sekolah_asal']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tahun Angkatan</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="tahun_angkatan" value="<?php echo $fetch_siswa['tahun_angkatan']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Diterima Di Kelas</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="diterima_kelas">
                                                            <option <?php if($fetch_siswa['diterima_kelas'] == 'X MIPA'):?> selected="selected" <?php endif;?> name="X MIPA">X MIPA</option>
                                                            <option <?php if($fetch_siswa['diterima_kelas'] == 'X IIS'):?> selected="selected" <?php endif;?> name="X IIS">X IIS</option>
                                                            <option <?php if($fetch_siswa['diterima_kelas'] == 'XI MIPA'):?> selected="selected" <?php endif;?> name="XI MIPA">XI MIPA</option>
                                                            <option <?php if($fetch_siswa['diterima_kelas'] == 'XI IIS'):?> selected="selected" <?php endif;?> name="XI IIS">XI IIS</option>
                                                            <option <?php if($fetch_siswa['diterima_kelas'] == 'XII MIPA'):?> selected="selected" <?php endif;?> name="XII MIPA">XII MIPA</option>
                                                            <option <?php if($fetch_siswa['diterima_kelas'] == 'XII IIS'):?> selected="selected" <?php endif;?> name="XII IIS">XII IIS</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Diterima Tanggal</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="diterima_tanggal" class="form-control" value="<?php echo $fetch_siswa['diterima_tanggal']?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>B. Data Orang Tua</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_ayah" value="<?php echo $fetch_siswa['nama_ayah']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo $fetch_siswa['pekerjaan_ayah']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Ibu</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_ibu" value="<?php echo $fetch_siswa['nama_ibu']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo $fetch_siswa['pekerjaan_ibu']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_ortu"><?php echo $fetch_siswa['alamat_ortu']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Telepon Orang Tua</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" class="form-control" name="telepon_ortu" value="<?php echo $fetch_siswa['telepon_ortu']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email Orang Tua</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email_ortu" value="<?php echo $fetch_siswa['email_ortu']?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>C. Data Wali</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="nama_wali" value="<?php echo $fetch_siswa['nama_wali']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Pekerjaan Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="pekerjaan_wali" value="<?php echo $fetch_siswa['pekerjaan_wali']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Alamat Wali</label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="3" name="alamat_wali"><?php echo $fetch_siswa['alamat_wali']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Telepon Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" maxlength="15" class="form-control" name="telepon_wali" value="<?php echo $fetch_siswa['telepon_wali']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email Wali</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email_wali" value="<?php echo $fetch_siswa['email_wali']?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <center>
                                            <button type="submit" onclick="return confirm('Yakin mau menambah data ini?')" class="btn btn-primary"><span class="fa fa-download"></span> SAVE</button>
                                            <a href="siswa_index.php" onclick="return confirm('Yakin batal merubah data?')" class="btn btn-danger"><span class="fa fa-arrow-left"></span> CANCEL</a>
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
