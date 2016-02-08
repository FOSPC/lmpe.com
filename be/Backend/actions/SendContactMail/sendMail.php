<?php
	if (isset($_POST['nom']) && isset($_POST['message']))
	{
		$message=(isset($_POST['message']))? $_POST['message']:"";
		#correction du message----------------------------
		$message = str_replace("\n.", "\n..", $message);
		$message = wordwrap($message,70);
		$message=htmlspecialchars($message);
		#-------------------------------------------------
		
		$nom=(isset($_POST['nom']))? $_POST['nom']:"";
		
		
		$sender=(isset($_POST['email']))? $_POST['email']:"";
		$sender="From: ".$sender;
		

		$subject="Lmpe Contact";
		$to="soufiane.arbib.95@gmail.com";
		mail($to, $subject, $message,$sender);
		header("location:../../../contact.php?c=mailsent");
	}
	else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}

?>