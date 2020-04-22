<?php
$error="";
$error1="";
$success="";
if(isset($_POST['submit'])){
	require 'phpmailer/PHPMailerAutoload.php';
	$mail=new PHPMailer();
	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->Port='465';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='ssl';
	$mail->Username='mmrchpreet@gmail.com';
	$mail->Password='mmrch1822';
	$mail->setfrom($_POST['email']);
	$mail->AddAddress('mmrchmanya@gmail.com');
	$mail->AddReplyTo($_POST['email']);
	$mail->isHTML(true);
	$mailback=new PHPMailer();
	$mailback->isSMTP();
	$mailback->Host='smtp.gmail.com';
	$mailback->Port='465';
	$mailback->SMTPAuth=true;
	$mailback->SMTPSecure='ssl';
	$mailback->Username='mmrchpreet@gmail.com';
	$mailback->Password='mmrch1822';
	$mailback->setfrom('no-reply@schoolonline.com');
	$mailback->AddAddress($_POST['email']);
	$mailback->AddReplyTo('no-reply@schoolonline.com');
	$mailback->isHTML(true);
	$mail->Subject=$_POST['name'].' visited the page !';
	$mail->Body='<table border="1" ><tr><td>Name:</td><td>'.$_POST['name'].'</td></tr><tr><td>Email:</td><td>'.$_POST['email'].'</td></tr><tr><td>Message:</td><td>'.$_POST['message'].'</td></tr></table>';
	if(!$mail->send()){
		$error='Mail not sent'.$_POST['name'].' try again !';
	}else{
		$mailback->Subject='Thanks for visiting school online'.$_POST['name'];
		$mailback->Body='We will back to you '.$_POST['name'].' with more details !';
		if(!$mailback->send()){
			$error1='Mail not sent try again !';
		}else{
		$success='We will be right back you '.$_POST['name'].' !';
	}
}
}

?>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<div class="container" style="background-image: url('images/contact.jpg');">
    <h2 class="text-center">Contact Form</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action="" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Drop us a message</h3>
									<h5 class="alert-heading"><?= $success; ?></h5>
									<h5 class="alert-heading"><?= $error; ?></h5>
									<h5 class="alert-heading"><?= $error1; ?></h5>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="abc@xyz.pqr.com" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" name='message' placeholder="Enter message for us" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" name="submit" value="Send Email !" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
</html>