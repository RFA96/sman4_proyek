<?php
/**
 * Created by PhpStorm.
 * User: Raka_Matsukaze
 * Date: 11/25/17
 * Time: 22:52
 */
    include "koneksi.php";

    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);

    $q =  mysql_query("SELECT * FROM login WHERE username = '$username' AND password = '$password'");
    $result = mysql_num_rows($q);
    $result_2 = mysql_fetch_array($q);

    if($result > 0)
    {
        session_start();
        $_SESSION['username'] = $result_2['username'];
        $_SESSION['tahun_akademik'] = $_POST['tahun_akademik'];

        if($result_2['jabatan'] == "Guru")
        {
            header("location: guru/index.php");
        }
        else if($result_2['jabatan'] == "Admin")
        {
            header("location: admin_index.php");
        }
        else
        {
            echo "Nanti buat siswa";
        }
    }
    else
    {
        header("location: index.php?error=1");
    }
?>