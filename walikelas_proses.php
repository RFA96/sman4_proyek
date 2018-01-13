<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/31/17
 * Time: 16:26 PM
 */
    include "koneksi.php";

    $crud = $_GET['crud'];

    //Form
    $guru = $_POST['guru'];
    $kode = $_GET['kode'];
    $tahun_akademik = $_GET['tahun_akademik'];

    if($crud == "create")
    {
        $cek_guru = mysql_query("SELECT * FROM wali_kelas AS wk INNER JOIN guru g ON wk.id_guru = g.id_guru WHERE wk.id_guru = '$guru';");

        if(mysql_num_rows($cek_guru) > 0)
        {
            header("location: walikelas_form.php?error=1&kode_kelas=$kode");
            exit();
        }
        else
        {
            $result = mysql_query("INSERT INTO wali_kelas(id_guru, kode_kelas, id_tahun_akademik) VALUES ($guru, $kode, $tahun_akademik)");
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
    }