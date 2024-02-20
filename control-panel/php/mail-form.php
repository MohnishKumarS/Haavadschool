<?php 
    require './PHPMailer/PHPMailerAutoload.php';
    //PHPMailer Object
    $mail = new PHPMailer;

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "nl-sl-box2.e-hostbox.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = "admin@harvardcbse.com"; // GMAIL username
    $mail->Password = "Harvard@123"; // GMAIL password

    /* $mail->SMTPDebug = 2; */

    //From email address and name
    $mail->From = "admin@harvardcbse.com";
    $mail->FromName = "Omprakash Arumugam";

    //To address and name
    $mail->addAddress("admin@harvardcbse.com");

    //Address to which recipient will reply
    $mail->addReplyTo("admin@harvardcbse.com", "Reply");

    //Send HTML or Plain Text email
    $mail->isHTML(true);

    $mail->Subject = hackProof ($_POST["Application_Type"]);
    $mail_body = "<table>";
    foreach ($_POST as $key => $value) {
        $key = hackProof ($key);
        $key = str_replace("_", " ", $key);
        $value = hackProof ($value);
        $mail_body .= "<tr><th style='border: 1px solid black; padding: 5px;'>$key</th><td style='border: 1px solid black; padding: 5px;'>$value</td></tr>";
    }
    $mail_body .= "</table>";
    $mail->Body = $mail_body;
    $mail->AltBody = "This is the plain text version of the email content";
    if(!$mail->send()) 
    {
        echo "Error submitting application!";
    } 
    else 
    {
        echo "Application submitted successfully!";
    }

    // Hack proof 
    function hackProof ($data) {
        $data = trim ($data);
        $data = htmlspecialchars ($data);
        return $data;
    }
?>