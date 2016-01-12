<?php

	if (isset($_REQUEST['subject']))
	{
		//if "email" is filled out, send email
		require("PHPMailer_5.2.0/class.phpmailer.php");

		$mail = new PHPMailer();

		$mymail = fopen("maillist.txt", "r") or die("Unable to open file!");
		$from = fgets($mymail);
  		$to = fgets($mymail);
  		$from = substr($from, 0, -1);
  		$to = substr($from, 0, -1);

		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = "smtp.163.com";  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = "x13504";  // SMTP username
		$mail->Password = "youproveit"; // SMTP password

		$mail->From = $from;
		$mail->FromName = "Reminder";
		$mail->AddAddress($to);

		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = $_REQUEST['subject'];
		$mail->Body    = $_REQUEST['message'];

		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
		echo "The message has been sent.";
	}
	else
	{
		echo "An error occurs.";
	}

	unset($_REQUEST);
	//header('Location: main.html');

?>
