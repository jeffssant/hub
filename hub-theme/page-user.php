<?php
/*
Template Name: Registration
*/
include get_template_directory() . '/assets/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mail->CharSet="UTF-8";
$mailer->SMTPDebug = 1;
$mail->Host = 'email-ssl.com.br';
$mail->Port = 465;  
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mailer->Username = 'contato@hubvocacional.com.br'; //Login de autenticação do SMTP
$mailer->Password = 'Leandro@2020'; //Senha de autenticação do SMTP
$mailer->FromName = 'Siete hube'; //Nome que será exibido
$mailer->From = 'contato@hubvocacional.com.br';
$mailer->AddAddress('santana.jeff@gmail.com','Nome do 
destinatário');
//Destinatários
$mailer->Subject = 'Teste enviado através do PHP Mailer 
SMTPLW';
$mailer->Body = 'Este é um teste realizado com o PHP Mailer 
SMTPLW';
if(!$mailer->Send())
{
echo "Message was not sent";
echo "Mailer Error: " . $mailer->ErrorInfo; exit; }
print "E-mail enviado!";