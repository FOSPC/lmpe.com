<?php
class Article extends Connexion{

											#nom de la table
											private $table = "article";
											
											
											
											#les nom de columns dans la table
											private $idArticleCol = "code_article";
											private $titreArticleCol = "titre_article";
											private $sousTitreArticleCol = "soustitre_article";
											private $contenuArticleCol = "content_article";
											private $imageArticleCol = "image_article";
											private $supportArticleCol = "support_article";
											private $mediaArticleCol = "mediatheque_article";
											private $datePubArticleCol = "datepub_article";
											private $emailAdminCol = "email_admin";
											private $CategorieCol = "categorie";
											
											#structure de la table
											private $idArticle;
											private $titreArticle;
											private $sousTitreArticle;
											private $contenuArticle;
											private $imageArticle;
											private $supportArticle;
											private $mediaArticle;
											private $datePubArticle;
											private $Categorie;
											private $emailAdmin;
											
											
										
											public function __construct($data = array())
											{
												$this->titreArticle =           isset($data['titreArticle']) ? $data['titreArticle'] : "";
												$this->sousTitreArticle =       isset($data['sousTitreArticle']) ? $data['sousTitreArticle'] : "";
												$this->contenuArticle =         isset($data['contenuArticle']) ? $data['contenuArticle'] : "";
												$this->imageArticle=            isset($data['imageArticle'])? $data['imageArticle'] : ""; 
												$this->supportArticle=          isset($data['supportArticle'])? $data['supportArticle']:"";
												$this->mediaArticle=            isset($data['mediaArticle'])? $data['mediaArticle']:"";
												$this->datePubArticle=          isset($data['datePubArticle'])? $data['datePubArticle']:"";
												$this->Categorie=               isset($data['Categorie'])? $data['Categorie']:"";
												$this->emailAdmin=              isset($data['emailAdmin'])? $data['emailAdmin']:"";
											}
										
										
											#CREATE OR UPDATE
public function saveOrUpdate($id=null)
{
  if($id==null)
   {
		#CREATE
		$sql = "INSERT INTO {$this->table} VALUES('0','{$this->titreArticle}' ,'{$this->sousTitreArticle}'	,'{$this->contenuArticle}' ,
		'{$this->imageArticle}',
		'{$this->supportArticle}',
		'{$this->mediaArticle}',
		'{$this->datePubArticle}',
		'{$this->emailAdmin}',
		'{$this->Categorie}'
		)";
   }
   else
   {
	#UPDATE
	$sql = "UPDATE {$this->table} SET {$this->titreArticleCol}='{$this->titreArticle}',{$this->sousTitreArticleCol}='{$this->sousTitreArticle}',
	{$this->contenuArticleCol}='{$this->contenuArticle}',
	{$this->imageArticleCol}='{$this->imageArticle}',
	{$this->supportArticleCol}='{$this->supportArticle}',
	{$this->mediaArticleCol}='{$this->mediaArticle}',
	{$this->datePubArticleCol}='{$this->datePubArticle}',
	{$this->emailAdminCol}='{$this->emailAdmin}', 
	{$this->CategorieCol}='{$this->Categorie}' WHERE {$this->idArticleCol}=".$id;
   }
	$query = $this->getPDO()->query($sql);
	return $query;
}
											

											
										
											#READ
											public function GetAllArticle($id=null,$limit=null)
											{
												if ($limit!=null)
												{
													$req="ORDRED BY {$this->idArticleCol} DESC LIMIT 0,".$limit;
													
												}
												else 
												{
													$req="";
												}
												
												
												if($id == null)
												{
													$sql = "SELECT * FROM {$this->table}";
												}
												else
												{
													$sql = "SELECT * FROM {$this->table} WHERE
													{$this->idArticleCol}=".$id;
												}
												$query = $this->getPDO()->query($sql);
												return $query;
											}
											
											public function GetNewArticle()
											{
												$sql = "SELECT * FROM {$this->table} LIMIT 3";
												
												$query = $this->getPDO()->query($sql);
												return $query;
											}
											
											
											
											
											
											
											
											public function getLastIdArticle()
											{
												$sql = "SELECT MAX({$this->idArticleCol}) FROM {$this->table}";
												$query = $this->getPDO()->query($sql);
												
												
												$resultat = $query->fetch();
												
												$id = $resultat[0];
												
												$noValue = 0;
												
															if(isset($id))
															{
																return $id;
																
															}
															else
															{
																return $noValue;
															}
											}
										
											#DELETE
											public function deleteArticle($id=null)
											{
												$sql = "DELETE FROM {$this->table} WHERE
												{$this->idArticleCol}=".$id;
												$query = $this->getPDO()->query($sql);
												return $query;
											}

}

