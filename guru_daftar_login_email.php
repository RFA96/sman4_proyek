<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 12/29/17
 * Time: 08:56 AM
 */
    include "koneksi.php";
    $id = $_GET['id_guru'];

    mysql_query("UPDATE guru SET password = 'password' WHERE id_guru = $id");
    $q_mail = mysql_query("SELECT nama_guru, email_guru, kode_login FROM guru WHERE id_guru = $id");
    $fetch_mail = mysql_fetch_array($q_mail);

    #PHPMailer
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

    //Send mail contents
    $mail->addAddress($fetch_mail['email_guru'], $fetch_mail['nama_guru']);
    $mail->Subject = 'Reset Password SIAKAD Guru';
    $mail->ContentType = "text/html";
    $mail->Body = "Password Anda sudah di-reset. Silahkan login dengan data sebagai berikut:<br><strong>Username: </strong>".$fetch_mail['kode_login']."<br><b>Password: </b>password";

    if(!$mail->send())
    {
        $errMsg = $mail->ErrorInfo;
        session_start();
        $_SESSION['errMsg'] = $errMsg;
        header("location: guru_daftar_login.php?sukses=3");
        exit();
    }
    else
    {
        echo "Message Sent!";
        header("location: guru_daftar_login.php?sukses=1");
    }
?>