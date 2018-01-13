<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/25/17
 * Time: 10:36 AM
 */
    include "koneksi.php";
    $id = $_GET['id_siswa'];

    mysql_query("UPDATE siswa SET password = 'password' WHERE id_siswa = $id");
    $q_mail = mysql_query("SELECT nama_siswa, email_siswa, email_ortu, kode_login FROM siswa WHERE id_siswa = $id");
    $fetch_mail = mysql_fetch_array($q_mail);

    #PHP MAILER
    use PHPMailer\PHPMailer\PHPMailer;

    #VENDOR
    require 'assets/vendor/autoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 2;

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;

    $mail->Username = 'sman4.coba@gmail.com';
    $mail->Password = 'bladeliger';

    $mail->setFrom('sman4.coba@gmail.com', 'Admin SMA Negeri 4 Kota Bekasi');
    //Send mail Contents
    $mail->addAddress($fetch_mail['email_siswa'], $fetch_mail['nama_siswa']);
    $mail->Subject = 'Reset Password SIAKAD';
    $mail->ContentType = "text/html";
    $mail->Body = "Password Anda sudah di-reset. Silahkan login dengan data sebagai berikut:<br><strong>Username: </strong>".$fetch_mail['kode_login']."<br><b>Password: </b>password";

    if(!$mail->send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        echo "Message Sent!";
        header("location: siswa_daftar_login.php?sukses=1");
    }