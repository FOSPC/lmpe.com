<?php
			session_start();
			require_once("../../module/Session.php");
			$session = new Session();		
		    $session->destructSession();
			header("location:../../admin");	
?>