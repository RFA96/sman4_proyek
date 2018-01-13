<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/28/17
 * Time: 18:40 PM
 */
//    include "koneksi.php";

    //Form
    $id_guru = $_POST['id_guru'];
    $kode_login = $_POST['kode_login'];
    $password = stripslashes($_POST['password']);

    $result = mysql_query("UPDATE guru SET kode_login = '$kode_login', password = '$password' WHERE id_guru = $id_guru");

    if(!$result)
    {
        $errMsg = mysql_error();
        session_start();
        $_SESSION['errMsg'] = $errMsg;
        header("location: guru_daftar_login.php?sukses=3");
        exit();
    }
    else
    {
        header("location: guru_daftar_login.php?sukses=2");
        exit();
    }
?>