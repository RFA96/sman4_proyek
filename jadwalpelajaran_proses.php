<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/4/18
 * Time: 02:31 AM
 */
    include "koneksi.php";

    $crud = $_GET['crud'];

    $id_tahun_akademik = $_POST['id_tahun_akademik'];
    $kode_kelas = $_POST['kode_kelas'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam_mulai'].' - '.$_POST['jam_selesai'];
    $kode_mapel = $_POST['kode_mapel'];
    $id_guru = $_POST['id_guru'];

    if($crud == "create")
    {
        $result = mysql_query("INSERT INTO jadwal(id_tahun_akademik, kode_kelas, hari, jam, kode_mapel, id_guru) VALUES ($id_tahun_akademik, $kode_kelas, '$hari', '$jam', $kode_mapel, $id_guru)");
        if(!$result)
        {
            $errMsg = mysql_error();
            session_start();
            $_SESSION['errMsg'] = $errMsg;
            header("location: jadwalpelajaran_index.php?sukses=3&kode_kelas=$kode_kelas");
            exit();
        }
        else
        {
            header("location: jadwalpelajaran_index.php?sukses=2&kode_kelas=$kode_kelas");
            exit();
        }
    }