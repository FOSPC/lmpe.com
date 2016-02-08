<?php
	class Newsletter extends Connexion{
		
										private $table = "newsletter";
										private $idMembre;
										private $emailMembre;
										
										
										
										private $idMembreCol= "code_membre";
										private $emailMembreCol= "email_membre";
										
										

										public function __construct($email=null)
										{
											$this->emailMembre=$email;
										}
										
										#CREATE:INSERT
										public function save()
										{
											#save
												$sql = "INSERT INTO {$this->table} VALUES(
														'0',
														'{$this->emailMembre}'
														)";
												$query = $this->getPDO()->query($sql);
												return $query;
										}
										
										#READ
										public function getAllEmails()
										{
											$sql = "SELECT * FROM {$this->table}";
											$query = $this->getPDO()->query($sql);
											return $query;
										}
	}
?>