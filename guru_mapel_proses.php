<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/1/18
 * Time: 17:37 PM
 */
    include "koneksi.php";

    $crud = $_GET['crud'];

    $kode_mapel = $_POST['kode_mapel'];
    $id_guru = $_POST['id_guru'];

    if($crud == "create")
    {
        $result = mysql_query("INSERT INTO mengajar(kode_mapel, id_guru) VALUES ($kode_mapel, $id_guru)");
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
            header("location: guru_index.php?sukses=6");
            exit();
        }
    }
    else
    {
        $id = $_GET['id_guru'];
        $result = mysql_query("UPDATE mengajar SET kode_mapel = $kode_mapel WHERE id_guru = $id");
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
            header("location: guru_index.php?sukses=7");
            exit();
        }
    }