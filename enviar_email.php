<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader, Carregador automático do Load Composer
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions, A instanciação e a passagem de `true` permitem exceções
$mail = new PHPMailer(true);

try {
    //Server settings, Configurações do servidor


    // Esta area faz aparecer todo o processo de email na pagina (this area displays the entire email process on the page)
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'leandrorduarte0@gmail.com';                     // SMTP username
    $mail->Password   = 'Gmd320808';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients, Destinatários
    $mail->setFrom('leandrorduarte0@gmail.com', 'LeandroGmail');
    $mail->addAddress($email, 'Destinatario');     // Add a recipient
   
    // Content, Conteúdo
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;
   

    $mail->send();
   
    echo 'E-mail enviado com sucesso!!!!';
    
    // session_destroy();
    

    // die();
    // exit;
    
    
    
    
    
    
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

