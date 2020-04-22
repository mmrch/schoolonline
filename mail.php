<?php
if(isset($_POST[submit])){
	require 'phpmailer/PHPMailerAutoload.php';
	$mail=new PHPMailer;
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username='mmrchpreet@gmail.com';
	$mail->Password='mmrch1822';
	$mail->setfrom($_POST['email']);
	$mail->AddAddress('mmrchmanya@gmail.com');
	$mail->AddReplyTo($_POST['email']);
	$mail->isHTML(true);
	$mail->Subject=$_POST['name'].' visited the page !';
	$mail->Body='<table border="1" ><tr><td>Name:</td><td>'.$_POST['name'].'</td></tr><tr><td>Email:</td><td>'.$_POST['email'].'</td></tr><tr><td>Message:</td><td>'.$_POST['message'].'</td></tr></table>';
	if(!$mail->send()){
		$error='Mail not sent , try again !';
	}else{
		$success='We will be right back you '.$_POST[name].' !';
	}
}

?>