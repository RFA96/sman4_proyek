<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/25/17
 * Time: 9:52 AM
 */
    include "koneksi.php";

    $kode_login = $_POST['kode_login'];
    $id_siswa = $_POST['id_siswa'];
    $password = $_POST['password'];

    mysql_query("UPDATE siswa SET kode_login = '$kode_login', password = '$password' WHERE id_siswa = $id_siswa");

    header("location: siswa_daftar_login.php?sukses=2");
?>