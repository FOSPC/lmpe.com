<?php
	if (isset($_GET['id'] ))
	{
		require_once '../../module/Connexion.php';
		require_once '../../module/model/user.php';
		require_once '../../module/model/commentaire.php';
		
		$user=new User();
		$result=$user->deleteUser($_GET['id']);
		
		#delete all comments for this user
		
		$comment=new Commentaire();
		$comment->deleteAllCommentForUserId($_GET['id']);
		
		
		
		if ($result)
		{
			header("location:../../admin/users/editer");
		}
		else 
		{
			header("location:../../admin/users/editer?c=failed");
		}
	}else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}



?>