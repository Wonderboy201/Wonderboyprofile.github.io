<?php
 
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alart = '';

if(isset($_POST['submit'])){


$Name = $_POST['Name'];
$email = $_POST['email'];
//$whom = $_POST['whom'];
$Subject = $_POST['Subject'];

$Message = $Name . " " . $email . "wrote the following" . "\n\n" . $_POST['Message'];

try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'wonderboymjongo@gmail.com';
        $mail->Password = 'gxfqsdpocldzejam';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('wonderboymjongo@gmail.com');
        $mail->addAddress('wonderboymjongo@gmail.com');

        $mail->isHTML(true);
        $mail->$Subject ='Massage Recieved from Contact:'.$name;
        $mail->Body = "Name: $Name <br>Email: $email <br>Subject: $Subject <br>Message: $Message";

        $mail->send();

        $alert= "<div class = 'alert-success'><span>Message sent. we'll get back to you shortly</span></div>";


}catch (Exception $e){

    $alert = "<div class='alert-error'><span>'.$e->getMessage().'</span></div>";

}

}



//mail($whom,$Subject,$Message);

//echo"Mail sent. Thank you" . $Name. "we will contact you shortly.";
?>