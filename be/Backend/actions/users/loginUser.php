
<?php
	session_start();
	require_once("../../module/Connexion.php");
	require_once("../../module/model/user.php");
	require_once("../../module/Session.php");
	
	if(isset($_POST["email"]))
	{
        # preparation des donnees    

		$email = (isset($_POST["email"]))?$_POST["email"]:"";
		$pwd = (isset($_POST["password"]))?$_POST["password"]:"";
		$data = array('email'=>$email,'password'=>$pwd);
		
		
        # execution de l'operation
		$user= new User();
		$result = $user->checkLog($data);
		
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
						header("location:../../../index");
					}
					else
					{
						echo "aucune session";
					}	
		}
		else
		{
			header("location:../../../login?c=failed");	
		}

	}
	else
	{
		include_once("../../layout/Intrusion/url.inc");
	}
?>