<?php
		if (isset($_GET['id']))
		{
			require_once '../../module/Connexion.php';
			require_once '../../module/model/article.php';	
			# execution de l'operation 
			$article=new Article();
			$result=$article->deleteArticle($_GET['id']);
			
			#tester le rendu
		    if ($result)
		    {
		    	header("location:../../admin/article/editer?id=".$_GET['id']);
		    }
		    else 
		    {
		    	header("location:../../admin/article/editer?c=failed");
		    }
		}
		else
		{
			header("location:../../layout/Intrusion/url.inc");
		}
?>