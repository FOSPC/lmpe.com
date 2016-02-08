<?php
	if (isset($_POST['nom_categorie']))
	{
		require_once '../../module/Connexion.php';
		require_once '../../module/model/categorie.php';
		
		# préparation des données et l'execution de l'operation
		$categorie=new Categorie($_POST['nom_categorie'],$_POST['discription_categorie']);
		$result=$categorie->saveOrUpdate();
		
		#tester le rendu
		if ($result)
		{
			header("location:../../admin/categorie/index?c=success");
		}
		else
		{
			header("location:../../admin/categorie/index?c=failed");
		}
	}
	else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}
?>