<?php
	if (isset($_GET['idArticle']) && isset($_GET['UserMail']) && isset($_POST['com']))
	{
		require_once '../../module/Connexion.php';
		require_once '../../module/model/commentaire.php';
		require_once '../../module/model/user.php';
		
		$user=new  User();
		
		$userId=$user->getUserIdByEmail($_GET['UserMail']);
	
		$comment=new Commentaire($_POST['com'],$userId,$_GET['idArticle']);

		$result=$comment->save();
		
	
		
		
		if ($result)
		{
			header("location:../../../article?id=".$_GET['idArticle']);
		}
		else 
		{
			header("location:../../../article?c=failed&&id=".$_GET['idArticle']);
		}
	}
	else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}

?>

	















