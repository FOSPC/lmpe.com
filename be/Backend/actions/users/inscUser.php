<?php
	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nom']))
	{
		require_once '../../module/Connexion.php';
		require_once '../../module/model/user.php';
		require_once '../../module/model/newsletter.php';
		
		# save the user into newsletter (auto )  ;)
		$newslatter=new Newsletter($_POST['email']);
		$newslatter->save();
		
		$Doublemail="";# to check if the email is allredy exist
		
		$name=(isset($_POST['nom']))? $_POST['nom'] :""; 
		$lname=(isset($_POST['prenom']))? $_POST['prenom'] :"";
		$bd=(isset($_POST['bd']))? $_POST['bd'] :"";
		$email=(isset($_POST['email']))? $_POST['email'] :"";
		$password=(isset($_POST['password']))? $_POST['password'] :"";
	
		$data=array(
				'name'=>$name,
				'lname'=>$lname,
				'bd'=>$bd,
				'email'=>$email,
				'password'=>$password
		);
		
		$user=new User($data);
		$result=$user->save();
		
		if ($result=="existe")
		{
			$Doublemail="&&mail=duplicated";
		}
		
		
		if ($result==true && $result<>"existe")
		{
			header("location:../../../login?c=success");
		}
		else if ($result==true && $result=="existe")
		{
			header("location:../../../inscription?mail=duplicated");
		}
		else 
		{
			header("location:../../../inscription?c=failed");
		}

	}
	else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}
?>