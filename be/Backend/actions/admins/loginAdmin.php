<?php
	session_start();
	require_once("../../module/Connexion.php");
	require_once("../../module/model/admin.php");
	require_once("../../module/Session.php");
	
	if(isset($_POST["email"]))
	{
        # preparation des donnees    
		$email = (isset($_POST["email"]))?$_POST["email"]:"";
		$pwd = (isset($_POST["pwd"]))?$_POST["pwd"]:"";	
		$data = array('email'=>$email,'pwd'=>$pwd);
		
		
        # execution de l'operation
		$admin= new Admin();
		$result = $admin->checkLog($data);
		
		#tester le rendu
		if($result)
		{
					$session = new Session();
					$dataSession = array(
							'name'=>'email',
							'value'=>$email
					        );
		
					$session->setSession($dataSession);
					
					if($session->checkSession("email"))
					{
						#redirection vers l'admin
						header("location:../../admin/index");
					}
					else
					{
						echo "aucune session";
					}	
		}
		else
		{
			header("location:../../admin/index?c=failed");	
		}

	}
	else
	{
		include_once("../../layout/intrusion/url.inc");
	}
?>