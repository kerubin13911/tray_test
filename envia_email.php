<?php
require_once("phpmailer/class.phpmailer.php");

define('GUSER', '********@gmail.com');
define('GPWD', '*********');		

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$para = '*********@gmail.com';
	$de = '************@gmail.com';
	$de_nome = '********@gmail.com';
	$assunto = $_POST['msg'];
	$corpo = $_POST['venda'];
	$mail = new PHPMailer();
	$mail->IsSMTP();		
	$mail->SMTPDebug = 2;		
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';	
	$mail->Host = 'smtp.gmail.com';	
	$mail->Port = 465;  		
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = "<script>alert('E-mail enviado com sucesso!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
		return true;
	}
}	

 if (smtpmailer('$para', '$de', '$de_nome', '$assunto', '$corpo'))
if (!empty($error)) echo $error;

?>
<html>
	<body bgcolor="#6495ED"/>
</html>