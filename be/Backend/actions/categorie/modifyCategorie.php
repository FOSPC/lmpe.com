<?php

	# " le testé pour effectuer la modification "
	if (isset($_POST['nom_categorie']))
	{
		
		require_once '../../module/Connexion.php';
		require_once '../../module/model/categorie.php';
		
		# préparation des données et l'execution de l'operation
		$categorie=new Categorie($_POST['nom_categorie'],$_POST['discription_categorie']);
		$result=$categorie->saveOrUpdate($_GET['id']);
		
		# tester le rendu
		if ($result)
		{
			header("location:../../admin/categorie/index?c=success");
		}
		else
		{
			header("location:../../admin/categorie/index?c=failed");
		}
	}
	 # test pour la redirection vers la forme de saisie pour la modification en attendant la redirection de puis la forme vers cette action    
	else if (isset($_GET['c']))
	{
		header("location:../../admin/categorie/index?c=modify&&id=".$_GET['c']);
	}
	else
	{
		# le cas de l'intrusion
		include_once '../../layout/Intrusion/url.inc';
	}

?>