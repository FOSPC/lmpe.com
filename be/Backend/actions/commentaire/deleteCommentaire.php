<?php
	if (isset($_GET['code'] ))
	{
		require_once '../../module/Connexion.php';
		require_once '../../module/model/commentaire.php';
		
		$comment=new Commentaire();
		$result=$comment->deleteComment($_GET['code']);
		if ($result)
		{
			header("location:../../admin/article/articleVisualisation?id=".$_GET['id']);
		}
		else 
		{
			header("location:../../admin/article/articleVisualisation?c=failed");
		}
	}
	else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}



?>