<?php
require_once("../../module/Connexion.php");
require_once("../../module/model/admin.php");
	if (isset($_POST["email"]))
	{
		
		$admin=new Admin();
		
		# preparation des donnees
		
		$data=array(
		'name'=>$_POST["name"],
		'lname'=>$_POST["lname"],
		'bd'=>$_POST["bd"],
		'email'=>$_POST["email"],
		'password'=>$_POST["password"],
		'autorite'=>$_POST["autorite"]);
		# enregistrement
		$result=$admin->save($data);
		
		# tester le rendu
		if ($result)
		{	
			header("location:../../admin/sous_admin/index?c=success");
		}
		else 
		{
			header("location:../../admin/sous_admin/index?c=failed");
		}
		
		# le cas d'un email repeter
		if ($result=="existe")
		{
			header("location:../../admin/sous_admin/index?c=failedmail");
		}
	}
	else
	{
		include_once("../../layout/intrusion/url.inc");
	}





?>