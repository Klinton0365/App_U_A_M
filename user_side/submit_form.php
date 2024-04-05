<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
//if (isset($_POST["send"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'klinton.developer365@gmail.com';   //SMTP write your email
    $mail->Password   = 'dgoeozlzqsammzqr';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom($_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress('klinton.developer365@gmail.com');     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email


    // Set email content

    $mail->isHTML(true);                                  // Set email format to HTML

        // Send email to admin
        $to = "klinton.developer365@gmail.com";
        $subject = "New Form Submission";
        $message = "Name: $name\nMobile: $mobile\nEmail: $email";
        $headers = "From: webmaster@example.com";

    // Set email subject and message
    $subject = !empty($_POST["subject"]) ? $_POST["subject"] : 'Successfully Register';
    $message = !empty($_POST["message"]) ? $_POST["message"] : 'Thanks to reach us, Our team will reach you shortly!';

    $mail->Subject = $subject;   
    $mail->Body    = $message; 

    try{
    // Success sent message alert
    $mail->send();
    header("Location: success.php");
    }
    catch(Exception $e){
       // Display error message if sending failed
       echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}


error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../backend/Database.class.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    
    // Save data to the Database
    $conn = Database::getConnection();
    $sql = "INSERT INTO `user_deal` (`name`,`mobile`,`email`) VALUE ('$name','$mobile','$email')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success page
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
