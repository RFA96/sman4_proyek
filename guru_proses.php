<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/26/17
 * Time: 5:06 PM
 */
    include "koneksi.php";
    $crud = $_GET['crud'];

    //Form
    $kode_login = $_POST['kode_login'];
    $password = $_POST['password'];
    $nip_guru = $_POST['nip_guru'];
    $nama_guru = $_POST['nama_guru'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $golongan_darah = $_POST['golongan_darah'];
    $agama = $_POST['agama'];
    $email_guru = $_POST['email_guru'];
    $pendidikan = $_POST['pendidikan'];
    $program_studi_guru = $_POST['program_studi_guru'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $alamat_guru = $_POST['alamat_guru'];
    $telepon_guru = $_POST['telepon_guru'];

    if($crud == "create")
    {
        $result =  mysql_query("INSERT INTO guru(kode_login, password, nip_guru, nama_guru, jenis_kelamin, tempat_lahir, tanggal_lahir, golongan_darah, agama, email_guru, pendidikan, program_studi_guru, tanggal_masuk, tanggal_keluar, alamat_guru, telepon_guru) VALUES ('$kode_login', '$password', '$nip_guru', '$nama_guru', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah', '$agama', '$email_guru', '$pendidikan', '$program_studi_guru', '$tanggal_masuk', '$tanggal_keluar', '$alamat_guru', '$telepon_guru')");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: guru_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: guru_index.php?sukses=2");
            exit();
        }
    }
    else if($crud == "delete")
    {
        $id = $_GET['id_guru'];
        $result = mysql_query("DELETE FROM guru WHERE id_guru = $id");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: guru_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: guru_index.php?sukses=1");
            exit();
        }
    }
    else
    {
        $id = $_GET['id_guru'];
        $result = mysql_query("UPDATE guru SET nip_guru = '$nip_guru', nama_guru = '$nama_guru', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', golongan_darah = '$golongan_darah', agama = '$agama', email_guru = '$email_guru', pendidikan = '$pendidikan', program_studi_guru = '$program_studi_guru', tanggal_masuk = '$tanggal_masuk', tanggal_keluar = '$tanggal_keluar', alamat_guru = '$alamat_guru', telepon_guru = '$telepon_guru' WHERE id_guru = $id");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: guru_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: guru_index.php?sukses=4");
            exit();
        }

    }
?>