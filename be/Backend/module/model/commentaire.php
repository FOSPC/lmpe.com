<?php
	class Commentaire extends Connexion{
		
										private $table = "commentaire";
										private $idCommnet;
										private $textCommnet;
										private $idUser;
										private $idArticle;
										
										
										
										private $idCommnetCol = "code_com";
										private $textCommnetCol = "text_com";
										private $idUserCol = "code_user";
										private $idArticleCol = "code_article";

										public function __construct($txt=null,$user=null,$article=null)
										{
											$this->textCommnet=$txt;
											$this->idUser=$user;
											$this->idArticle=$article;
										}
										
										#CREATE:INSERT
										public function save()
										{
											#save
												$sql = "INSERT INTO {$this->table} VALUES(
														'0',
														'{$this->textCommnet}',
														'{$this->idArticle}',
														'{$this->idUser}'
														)";
												$query = $this->getPDO()->query($sql);
												return $query;
										}
										
										#READ
										public function getAllComment($id=null)
										{
													if($id==null)
													{
														
														$sql = "SELECT * FROM {$this->table}";
													}
													else
													{
														$sql = "SELECT * FROM {$this->table} 
																WHERE {$this->idCommnetCol}=".$id;	
													}
													$query = $this->getPDO()->query($sql);
													return $query;
										}
										
										
										public function getAllCommentforArticle($idArticle)
										{
										    $sql = "SELECT * FROM {$this->table} WHERE {$this->idArticleCol}=".$idArticle;
											$query = $this->getPDO()->query($sql);
											return $query;
										}

										#DELETE
										public function deleteComment($id)
										{
											$sql = "DELETE FROM {$this->table} 
											WHERE {$this->idCommnetCol}=".$id;
											$query = $this->getPDO()->query($sql);
											return $query;
										}
										
										public function deleteAllCommentForUserId($id)
										{
											$sql = "DELETE FROM {$this->table}
											WHERE {$this->idUserCol}=".$id;
											$query = $this->getPDO()->query($sql);
											return $query;
										}
										
	}
?>