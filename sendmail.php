<?php

//use PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// if (isset($_REQUEST["type"]) && $_REQUEST["type"] == "contact") {
//     $body = "<br>Name->" . $_POST["name"];
//     $body .= "<br>Subject->" . $_POST["subject"];

//     $body .= "<br>Email->" . $_POST["email"];
//     $body .= "<br>Message->" . $_POST["msg"];
//     echo  sendMail("contact@accmbhopal.org", "Enquiry", $body);
// } else if (isset($_REQUEST["type"]) && $_REQUEST["type"] == "ppt") {
//     //$url=urlencode();
//     require_once("PresentationManagement.php");
//     $res = getPresentationByID($_POST["pptid"]);
//     $res = json_decode($res);
//     $body = "<br>Name->" . $_POST["name"];
//     $body .= "<br>Email->" . $_POST["email"];
//     $body .= "<br>Message->download Request for " . $res->ppt->title;
//     // $res=file_get_contents("PresentationManagement.php?opt=pptid&pid=$_POST[pptid]");
//     //echo ( $res->ppt->title);
//     if (sendMail("vicepresident@accmbhopal.org", "ppt download request", $body) == "true") {
//         $body = $res->ppt->title . "<br>" . "ppt download request send successfully .<br> download link can be send on your email  ";
//         if (sendMail($_POST["email"], "AACM ppt download request", $body) == "true") {
//             echo "true";
//         } else {
//             echo "false";
//         }
//     } else {
//         echo "true";
//     }
// }


function sendMail($to, $subject, $body)
{
    require_once 'Mail/PHPMailer.php';
    require_once 'Mail/SMTP.php';
    require_once 'Mail/Exception.php';
    $mail = new PHPMailer; // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->Debugoutput = 'html';

    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
     $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; // 465 or 587
    $mail->IsHTML(true);
    $mail->Username = "jkkdsoni@gmail.com";
    $mail->Password = "Cauvery^1";

    $mail->SetFrom("jkkdsoni@gmail.com","BackPackers");
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
   // $mail->addReplyTo($to);
   
    if (!$mail->Send()) {
        //    return "Mailer Error: " . $mail->ErrorInfo;
        return "false";
    } else {
        return "true";
       
        
    }
}
 //sendMail("nitinmonugupta@gmail.com","demo","demo");
 
/*$from = 'jayjoshi0989@gmail.com';
$to = 'jayjoshi0989@gmail.com';
$subject = "Contact ";
$body = $_POST["email"].$_POST["message"];

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'jayjoshi0989@gmail.com',
        'password' => 'solution007'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}*/
