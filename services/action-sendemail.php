<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';

include 'koneksi.php';

if (isset($_GET['pese_id'])) {
    $pese_id = $_GET['pese_id'];
    $sql = "SELECT * FROM peserta WHERE pese_id = $pese_id";
} else {
    $sql = "SELECT * FROM peserta";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        //query
        $host        = "mail.karuhuntech.my.id";
        $emailsmtp   = "noreply@karuhuntech.my.id";
        $passsmtp    = "8n;gSFnbm;]0";
        $emailnotif  = $row['pese_email'];
        $judulemail  = "Token dari Evoting Pemilihan Ketua Angkatan";
        $descemail   = "Halo " . $row['pese_nama'] . " tolong isi data ini di website evoting ya! <br>
        Terimakasih telah melihat pesan ini.<br><br> 

        NIM:" . $row['pese_nim'] . "<br>
        Token:" . $row['pese_token'] . "<br><br>
        
        Token semuanya lowercase ya :3<br>
        
        Pesan ini bersifat otomatis mohon untuk tidak dibalas.<br>
        Terimakasih ^_^ <br>
        ";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $host;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $emailsmtp;                     //SMTP username
            $mail->Password   = $passsmtp;                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($emailsmtp, 'Notifier');
            $mail->addAddress($emailnotif, 'Mahasiswa');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $judulemail;
            $mail->Body    = $descemail;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        header("Location: ../admin/index.php?page=peserta&status=success");
    }
} else {
    echo "tidak ada calon!";
    header("Location: ../admin/index.php?page=peserta&status=success");
}
