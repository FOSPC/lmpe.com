<?php
	class Categorie extends Connexion{
		
										private $table = "categorie";
										private $idCategorie;
										private $nomCategorie;
										private $descriptionCategorie;
										
										
										private $idCategorieCol = "code_categorie";
										private $nomCategorieCol = "nom_categorie";
										private $descriptionCategorieCol = "description_categorie";
										
										public function __construct($nom=null,$description=null)
										{
											$this->nomCategorie = $nom;
											$this->descriptionCategorie = $description;
										}
										
										#CREATE:INSERT
										public function saveOrUpdate($id=null)
										{
												if($id != null)
												{
														#update
												  $sql = "UPDATE {$this->table} SET 
													{$this->nomCategorieCol}='{$this->nomCategorie}',
												    {$this->descriptionCategorieCol}='{$this->descriptionCategorie}'
													WHERE {$this->idCategorieCol}=".$id;
												}
												else
												{
														#save
														$sql = "INSERT INTO {$this->table} VALUES(
																'0',
																'{$this->nomCategorie}',
																'{$this->descriptionCategorie}'
																)";
												}
												$query = $this->getPDO()->query($sql);
												return $query;
										}
										
										
										
										
										
										
										
										
										#READ
										public function getAllCategorie($id=null)
										{
													if($id==null)
													{
														
														$sql = "SELECT * FROM {$this->table}";
													}
													else
													{
														$sql = "SELECT * FROM {$this->table} 
																WHERE {$this->idCategorieCol}=".$id;	
													}
													$query = $this->getPDO()->query($sql);
													return $query;
										}
										
										
										
										
										
										
										
										
										
										#DELETE
										public function deleteCategorie($id)
										{
											$sql = "DELETE FROM {$this->table} 
														WHERE {$this->idCategorieCol}=".$id;
											$query = $this->getPDO()->query($sql);
											return $query;
										}
										
	}
?>