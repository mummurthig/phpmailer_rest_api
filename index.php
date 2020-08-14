<?php

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$to_id = $obj['toid'];
$subject = $obj['subject'];
$message = $obj['message'];

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth=true;
$mail->SMTPSecure = 'tls';

$mail->Username = 'draspirantchemistry@gmail.com';          // Enter your email here
$mail->Password = '9486253959';                             // Enter your password

$mail->setFrom('draspirantchemistry@gmail.com', 'Miki');    // Eamil and Name
$mail->addAddress($to_id);                                  // Add a recipient
$mail->addReplyTo('draspirantchemistry@gmail.com');

$mail->isHTML(true);
$mail->Subject  = $subject;
$mail->Body  = $message;

if(!$mail->send()){
 
    http_response_code(500);                                // Error Message 500
    echo json_encode(array(
        "status" => 0,
        "message" => "Message Could Not be sent!"           // Mail Not Sent
    ));
                        
} 

else{

    http_response_code(200);                               // Success 200 OK 
    echo json_encode(array(
         "status" => 1,
         "message" => "Email sent Success!"                // Mail Sent
      ));
    
}

?>