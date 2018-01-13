<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/2/18
 * Time: 19:43 PM
 */
    include "../koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = mysql_query("SELECT * FROM guru WHERE kode_login = '$username' AND password = '$password'");
    $result = mysql_num_rows($q);
    $result_2 = mysql_fetch_array($q);

    if($result > 0)
    {
        session_start();
        $_SESSION['username'] = $result_2['nama_guru'];
        $_SESSION['tahun_akademik'] = $_POST['tahun_akademik'];
        header("location: guru_index.php");
        exit();
    }
    else
    {
        header("location: index.php?error=1");
        exit();
    }