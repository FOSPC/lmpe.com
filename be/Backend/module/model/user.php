<?php
class User extends Connexion{
								#nom de la table
								private $table = "user";
								
								#structure de la table
								private $idUser;
								private $nomUser;
								private $prenomUser;
								private $datenaissUser;
								private $emailUser;
								private $pwdUser;
								

								
								#les nom de columns utilis�es dans la table
								private $idUserCol= "code_user";
								private $nomUserCol = "nom_user";
								private $prenomUserCol = "prenom_user";
								private $datenaissUserCol = "datenaissance_user";
								private $emailUserCol = "email_user";
								private $pwdUserCol = "password_user";
							
								public function __construct($data=array())
								{
									$this->nomUser =(isset($data['name']))? $data['name'] :""; 
									$this->prenomUser =(isset($data['lname']))? $data['lname'] :"";
									$this->datenaissUser =(isset($data['bd']))? $data['bd'] :"";
									$this->emailUser =(isset($data['email']))? $data['email'] :"";
									$this->pwdUser =(isset($data['password']))? $data['password'] :"";
								}
							
								#CREATE OR UPDATE
                                
								public function save()
								{
								
									$Fsql = "SELECT * FROM {$this->table} WHERE $this->emailUserCol='{$this->emailUser}'";
								
									$query = $this->getPDO()->query($Fsql);
									if($query->fetchColumn() > 0)
									{
										return "existe";
									}
									else
									{
										#CREATE
										$sql = "INSERT INTO {$this->table} VALUES(
										'0',
										'{$this->nomUser}' ,
										'{$this->prenomUser}' ,
										'{$this->datenaissUser}' ,
										'{$this->emailUser}',
										'{$this->pwdUser}'
										)";
										$query = $this->getPDO()->query($sql);
										return $query;
									}
								}

								public function checkLog($data=array())
								{
									$email = $data["email"];
									$pwd = $data["password"];
									#composition de la requ�te sql
									$sql = "SELECT * FROM {$this->table} WHERE
									{$this->emailUserCol}='$email' AND
									{$this->pwdUserCol}='$pwd'";
									#ex�cution de la requ�te sql
									$query = $this->getPDO()->query($sql);
									#verification du nombre des columns re�u dans le resultat
									if($query->fetchColumn() > 0)
									{
										return true;
									}
									else
									{
										return false;
									}
								}
								
								

								# check if there is a duplicated email in the database
								
								
								
								
								
							
								#READ
								public function getAllUser($id=null)
								{
									if($id == null)
									{
										$sql = "SELECT * FROM {$this->table}";
									}
									else
									{
										$sql = "SELECT * FROM {$this->table} WHERE
										{$this->idUserCol}=".$id;
									}
									$query = $this->getPDO()->query($sql);
									return $query;
								}
								
								
								public function getUserNameById($id)
								{
										$sql = "SELECT * FROM {$this->table} WHERE
										{$this->idUserCol}=".$id;
									
									$query = $this->getPDO()->query($sql)->fetch();
									return $query['nom_user'];
								}
							
								public function getUserIdByEmail($email)
								{
									$sql = "SELECT * FROM {$this->table} WHERE
									{$this->emailUserCol}="."'".$email."'";
										
									$query = $this->getPDO()->query($sql)->fetch();
									return $query['code_user'];
								}
								
								
								
								
								
								
								#DELETE
								public function deleteUser($id=null)
								{
									$sql = "DELETE FROM {$this->table} WHERE
									{$this->idUserCol}=".$id;
									$query = $this->getPDO()->query($sql);
									return $query;
								}
								
								
								
								#GETTER
									public function getIdUserol()
									{
										return $this->idUserCol;
									}
									
									public function getNomUserCol()
									{
										return $this->nomUserCol;
									}
									
									public function getUserByEmail($email)
									{
										$sql = "SELECT * FROM {$this->table} WHERE {$this->emailUserCol}='$email'";
										$query=$this->getPDO()->query($sql)->fetch();
									
										return $query['nom_user'];
									}

}

?>