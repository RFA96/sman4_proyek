<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/18/17
 * Time: 8:06 PM
 */
    include "koneksi.php";
    $crud = $_GET['crud'];

    //Form
    $kode_login = $_POST['kode_login'];
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $golongan_darah = $_POST['golongan_darah'];
    $agama = $_POST['agama'];
    $alamat_siswa = $_POST['alamat_siswa'];
    $nama_ayah = $_POST['nama_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $alamat_ortu = $_POST['alamat_ortu'];
    $telepon_ortu = $_POST['telepon_ortu'];
    $email_ortu = $_POST['email_ortu'];
    $email_siswa = $_POST['email_siswa'];

    if(!empty($_POST['nama_wali']))
    {
        $nama_wali = $_POST['nama_wali'];
    }
    else
    {
        $nama_wali = null;
    }

    if(!empty($_POST['pekerjaan_wali']))
    {
        $pekerjaan_wali = $_POST['pekerjaan_wali'];
    }
    else
    {
        $pekerjaan_wali = null;
    }

    if(!empty($_POST['alamat_wali']))
    {
        $alamat_wali = $_POST['alamat_wali'];
    }
    else
    {
        $alamat_wali = null;
    }

    if(!empty($_POST['telepon_wali']))
    {
        $telepon_wali = $_POST['telepon_wali'];
    }
    else
    {
        $telepon_wali = null;
    }

    if(!empty($_POST['email_wali']))
    {
        $email_wali = $_POST['email_wali'];
    }
    else
    {
        $email_wali = null;
    }

    $nama_sekolah_asal = $_POST['nama_sekolah_asal'];
    $alamat_sekolah_asal = $_POST['alamat_sekolah_asal'];
    $tahun_angkatan = $_POST['tahun_angkatan'];
    $diterima_kelas = $_POST['diterima_kelas'];
    $diterima_tanggal = $_POST['diterima_tanggal'];

    if($crud == "create")
    {
        mysql_query("INSERT INTO siswa(kode_login, nisn, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, golongan_darah, agama, alamat_siswa, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, alamat_ortu, telepon_ortu, nama_wali, pekerjaan_wali, alamat_wali, telepon_wali, nama_sekolah_asal, alamat_sekolah_asal, tahun_angkatan, diterima_kelas, diterima_tanggal, email_ortu, email_wali, password, email_siswa) VALUES ('$kode_login', '$nisn', '$nama_siswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah', '$agama', '$alamat_siswa', '$nama_ayah', '$pekerjaan_ayah', '$nama_ibu', '$pekerjaan_ibu', '$alamat_ortu', '$telepon_ortu', '$nama_wali', '$pekerjaan_wali', '$alamat_wali', '$telepon_wali', '$nama_sekolah_asal', '$alamat_sekolah_asal', '$tahun_angkatan', '$diterima_kelas', '$diterima_tanggal', '$email_ortu', '$email_wali', 'password', '$email_siswa')");
        header("location: siswa_index.php");
    }
    else if($crud == "delete")
    {
        $id = $_GET['id_siswa'];
        mysql_query("DELETE FROM siswa WHERE id_siswa = $id");
        header("location: siswa_index.php");
    }
    else
    {
        $id = $_GET['id_siswa'];
        mysql_query("UPDATE siswa SET nisn = '$nisn', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', golongan_darah = '$golongan_darah', agama = '$agama', alamat_siswa = '$alamat_siswa', nama_ayah = '$nama_ayah', pekerjaan_ayah = '$pekerjaan_ayah', nama_ibu = '$nama_ibu', pekerjaan_ibu = '$pekerjaan_ibu', alamat_ortu = '$alamat_ortu', telepon_ortu = '$telepon_ortu', nama_wali = '$nama_wali', pekerjaan_wali = '$pekerjaan_wali', alamat_wali = '$alamat_wali', telepon_wali = '$telepon_wali', nama_sekolah_asal = '$nama_sekolah_asal', alamat_sekolah_asal = '$alamat_sekolah_asal', tahun_angkatan = '$tahun_angkatan', diterima_kelas = '$diterima_kelas', diterima_tanggal = '$diterima_tanggal', email_wali = '$email_wali', email_ortu = '$email_ortu', email_siswa = '$email_siswa' WHERE id_siswa = $id");
        header("location: siswa_index.php");
    }
?>