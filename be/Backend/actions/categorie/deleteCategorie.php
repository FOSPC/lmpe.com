<?php
if (isset($_GET['c']))
{
	require_once '../../module/Connexion.php';
	require_once '../../module/model/categorie.php';
	
	# execution de l'operation
	$categ=new Categorie();
	$result=$categ->deleteCategorie($_GET['c']);
	
	#tester le rendu 
	if($result)
	{
		header("location:../../admin/categorie/editer");
	}
	else
	{
		echo "
				<div class='alert alert-danger'>
					<strong>Failed !</strong> Impossible De Supprimer Cette categorie.
				</div>";
		echo "
				<a href='../../admin/index'>
					<div class='btn btn-md btn-danger'>
						Retourne Vers La Page Prinsipamle
					</div>
				</a>";
	}
}
else 
{
	include_once '../../layout/Intrusion/url.inc';
}
?>