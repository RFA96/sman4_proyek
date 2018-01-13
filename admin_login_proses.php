<?php
/**
 * Created by PhpStorm.
 * User: Raka_Matsukaze
 * Date: 12/1/17
 * Time: 01:10
 */
    include "koneksi.php";

    $crud = $_GET['crud'];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
    $nama_user = $_POST['nama_user'];
//    $id_guru = $_POST['id_guru'];
//    $id_siswa = $_POST['id_siswa'];

    if($crud == "create")
    {
        mysql_query("INSERT INTO login(username, password, jabatan, nama_user) VALUES ('$username', '$password', '$jabatan', '$nama_user')");
        header("location: admin_login_index.php");
    }
    else if($crud == "delete")
    {
        $id = $_GET['id'];
        mysql_query("DELETE FROM login WHERE id = $id");
        header("location: admin_login_index.php");
    }
    else
    {
        $id = $_GET['id'];
        mysql_query("UPDATE login SET username = '$username', password = '$password' WHERE id = $id");
        header("location: admin_login_index.php");
    }
?>
