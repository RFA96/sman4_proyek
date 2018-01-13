<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/29/17
 * Time: 23:30 PM
 */
    include "koneksi.php";

    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $crud = $_GET['crud'];

    if($crud == "create")
    {
        $result = mysql_query("INSERT INTO kelas(kelas, jurusan) VALUES ('$kelas', '$jurusan')");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: kelas_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: kelas_index.php?sukses=1");
            exit();
        }
    }
    else if($crud == "delete")
    {
        $kode = $_GET['kode_kelas'];
        $result = mysql_query("DELETE FROM kelas WHERE kode_kelas = $kode");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: kelas_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: kelas_index.php?sukses=2");
            exit();
        }
    }
    else
    {
        $kode = $_GET['kode_kelas'];
        $result = mysql_query("UPDATE kelas SET kelas = '$kelas', jurusan = '$jurusan' WHERE kode_kelas = $kode");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: kelas_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: kelas_index.php?sukses=4");
            exit();
        }
    }
?>