<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/1/18
 * Time: 09:44 AM
 */
    include "koneksi.php";

    $mapel = $_POST['mata_pelajaran'];

    $crud = $_GET['crud'];

    if($crud == "create")
    {
        $result = mysql_query("INSERT INTO mata_pelajaran(mata_pelajaran) VALUES ('$mapel')");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: mapel_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: mapel_index.php?sukses=1");
            exit();
        }
    }
    else if($crud == "delete")
    {
        $kode = $_GET['kode_mapel'];
        $result = mysql_query("DELETE FROM mata_pelajaran WHERE kode_mapel = $kode");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: mapel_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: mapel_index.php?sukses=2");
            exit();
        }
    }
    else
    {
        $kode = $_GET['kode_mapel'];
        $result = mysql_query("UPDATE mata_pelajaran SET mata_pelajaran = '$mapel' WHERE kode_mapel = $kode");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: mapel_index.php?sukses=3");
            exit();
        }
        else
        {
            header("location: mapel_index.php?sukses=4");
            exit();
        }
    }