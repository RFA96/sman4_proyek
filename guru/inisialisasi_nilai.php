<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/11/18
 * Time: 01:23 AM
 */
    include "../koneksi.php";
    $kode_kelas = $_GET['kode_kelas'];
    $id_siswa = $_GET['id_siswa'];
    $kode_mapel = $_GET['kode_mapel'];
    $id_guru = $_GET['id_guru'];
    $id_tahun_akademik = $_GET['id_tahun_akademik'];

    mysql_query("INSERT INTO nilai(id_siswa, kode_mapel, id_guru, kode_kelas, id_tahun_akademik, nilai_1, nilai_2, nilai_3, nilai_keterampilan_1, nilai_keterampilan_2, nilai_keterampilan_3, nilai_uts, nilai_uts_keterampilan, nilai_4, nilai_5, nilai_6, nilai_keterampilan_4, nilai_keterampilan_5, nilai_keterampilan_6, nilai_uas, nilai_uas_keterampilan, sikap_dalam_mapel) VALUES ($id_siswa, $kode_mapel, $id_guru, $kode_kelas, $id_tahun_akademik, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-')");
    header("location: nilaisiswa_index.php?id_siswa=$id_siswa&id_guru=$id_guru&kode_mapel=$kode_mapel&kode_kelas=$kode_kelas&id_tahun_akademik=$id_tahun_akademik");
    exit();
?>