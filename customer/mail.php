<?php
$result="";
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $useremail=$_POST['email'];
        $subject = $_POST['subject'];
        $message=$_POST['message'];
        
        require_once('phpmail/PHPMailerAutoload.php');

        $from = "tjx3879@gmail.com";
        $nameform = "Admin";
        $mail= new PHPMailer();
        $mail->SMTPDebug=0;
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->Host = "smtp.gmail.com";
        $mail->Port=465;
        $mail->Username = $from;
        $mail->Password = "Jinxuan020111@@";
        $mail->SMTPSecure="ssl";
        //$mail->setFrom($email,$name);
        $mail->From=$useremail;
        $mail->FromName=$name;
        //$mail->addCC($from,$name);
        $mail->Subject =$subject;
        $mail->isHTML();
        $mail->Body=$message;
        $mail->addAddress("tjx3879@gmail.com","Administrators");
        return $mail->send();
        if($mail->send())
        {
            header("refresh:0.001;url=main.php");
        }
       
    }
 
?>