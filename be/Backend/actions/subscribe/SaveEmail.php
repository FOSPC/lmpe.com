<?php
	if (isset($_POST['email']))
	{
		require_once '../../module/Connexion.php';
		require_once '../../module/model/newsletter.php';
		
		$newslatter=new Newsletter($_POST['email']);
		$newslatter->save();
		header("location:../../../index.php");
	}
	else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}

?>

	















