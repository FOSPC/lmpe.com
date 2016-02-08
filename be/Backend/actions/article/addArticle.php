
<?php

session_start();

	if (isset($_POST['content']))
	{
		require_once '../../module/Connexion.php';
		require_once '../../module/model/article.php';
		require_once '../../module/model/categorie.php';
		require_once '../../module/model/admin.php';
		require_once '../../module/Session.php';
		$session=new Session();
		$article=new Article();

		
		
############# preparation des information#################################################################
		
			# get admin email
			$email=$session->getSession('email');
			
			# get la date (riel time)
			$datepub=date('Y-m-d H:i:s');
			
			# upload the files
				    #upload image
				    $permissionok=0;
				    $imgrequied=0;
					if(isset($_FILES["image"]))
					{	$email=$email."helomail";
						$dossier = '../../uploadedFiles/';	
						$fichier = basename($_FILES['image']['name']);
						$extension = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
						if($extension == "jpg" || $extension == "png" || $extension == "gif")
						{
							$imageUploaded = ($article->getLastIdArticle()+1).md5($fichier).".".$extension;
							if(move_uploaded_file($_FILES['image']['tmp_name'],$dossier . $imageUploaded))
							{
								$permissionok++;
								$imgrequied++;
							}
						 }
					 }
					 
					 #upload video
					 if(isset($_FILES["video"]))
					 {
					 	$dossier = '../../uploadedFiles/';
					 	$fichier = basename($_FILES['video']['name']);
					 	$extension = strtolower(pathinfo($_FILES['video']['name'],PATHINFO_EXTENSION));
					 	if($extension == "mp4" || $extension == "mpeg4" || $extension == "mkv")
					 	{
					 		$videoUploaded = ($article->getLastIdArticle()+1).md5($fichier).".".$extension;
					 		if(move_uploaded_file($_FILES['video']['tmp_name'],$dossier . $videoUploaded))
					 		{
					 			$permissionok++;
					 		}
					 	}
					 }
					 
					 #upload support doc
					 if(isset($_FILES["support"]))
					 {
					 	$dossier = '../../uploadedFiles/';
					 	$fichier = basename($_FILES['support']['name']);
					 	$extension = strtolower(pathinfo($_FILES['support']['name'],PATHINFO_EXTENSION));
					 	if($extension == "pdf" || $extension == "docx" )
					 	{
					 		$supportUploaded = ($article->getLastIdArticle()+1).md5($fichier).".".$extension;
					 		if(move_uploaded_file($_FILES['support']['tmp_name'],$dossier . $supportUploaded))
					 		{
					 			$permissionok++;
					 		}
					 	}
					 }	
#####################################################################################################################
		
        # preparation de donnees
		$data=array(
				'titreArticle'=>$_POST['titre'],
				'sousTitreArticle'=>$_POST['soustitre'],
				'contenuArticle'=>$_POST['content'],
				'imageArticle'=>$imageUploaded,
				'supportArticle'=>$supportUploaded,
				'mediaArticle'=>$videoUploaded,
				'datePubArticle'=>$datepub,
				'Categorie'=>$_POST['categ'],
				'emailAdmin'=>$email
				);
		
		#execution de l'operation
		$article=new Article($data);
		$result=$article->saveOrUpdate();
		# tester le rendu
		if ($result)
		{
			header("location:../../admin/article/index?c=success&&nbr=$permissionok");
		}
		else
		{
			header("location:../../admin/article/index?c=failed&&nbr=$permissionok");
		}

	}
	else 
	{
		header("location:../../layout/Intrusion/url.inc");
	}




?>