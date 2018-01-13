<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/4/18
 * Time: 08:17 AM
 */
    include "koneksi.php";

    $crud = $_GET['crud'];

    $kode_kelas = $_POST['kode_kelas'];
    $id_siswa = $_POST['id_siswa'];

    if($crud == "create")
    {
        $result = mysql_query("INSERT INTO menempati(kode_kelas, id_siswa) VALUES ($kode_kelas, $id_siswa)");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: siswa_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: siswa_index.php?sukses=1");
            exit();
        }
    }
    else if($crud == "edit")
    {
        $id = $_GET['id_siswa'];
        $result = mysql_query("UPDATE menempati SET kode_kelas = $kode_kelas WHERE id_siswa = $id");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: siswa_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: siswa_index.php?sukses=2");
            exit();
        }
    }