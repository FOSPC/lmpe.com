<?php
if (isset($_GET['c']))
{
	require_once '../../module/Connexion.php';
	require_once '../../module/model/admin.php';
	
	$admin=new Admin();
	#execution de l'action
	$result=$admin->deleteAdmin($_GET['c']);
	
	#tester le rendu
	
	if($result)
	{
		header("location:../../admin/sous_admin/editer");
	}
	else
	{
		# si le resultat ==false (operation échoué)
		echo "
				<div class='alert alert-danger'>
					<strong>Failed !</strong> Impossible De Supprimer Ce Utilisateur.
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