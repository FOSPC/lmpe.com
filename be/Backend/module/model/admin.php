<?php
class Admin extends Connexion{
								#nom de la table
								private $table = "admin";
								
								#structure de la table
								private $idAdmin;
								private $nomAdmin;
								private $prenomAdmin;
								private $datenaissAdmin;
								private $emailAdmin;
								private $pwdAdmin;
								private $autoriteAdmin;
								

								
								#les nom de columns utilis�es dans la table
								private $idAdminCol = "code_admin";
								private $nomAdminCol = "nom_admin";
								private $prenomAdminCol = "prenom_admin";
								private $datenaissAdminCol = "datenaissance_admin";
								private $emailAdminCol = "email_admin";
								private $pwdAdminCol = "password_admin";
								private $autoriteAdminCol = "autorite_admin";
							
								public function __construct($nom=null,$prenom=null,$datenaiss=null, $email=null,$pwd=null,$autorite=null)
								{
									$this->nomAdmin = $nom;
									$this->prenomAdmin = $prenom;
									$this->datenaissAdmin=$datenaiss;
									$this->emailAdmin = $email;
									$this->pwdAdmin=$pwd;
									$this->autoriteAdmin=$autorite;
									
								}
							
								#CREATE
								public function save($data=array())
								{
								
									$sql = "SELECT * FROM {$this->table} WHERE $this->emailAdminCol='".$data['email']."'";

									$query = $this->getPDO()->query($sql);
									if($query->fetchColumn() > 0)
									{
										return "existe";
									}
									else
									{
										#CREATE
										$sql = "INSERT INTO {$this->table} VALUES(
										'0',
										'{$data['name']}',
										'{$data['lname']}',
										'{$data['bd']}',
										'{$data['email']}',
										'{$data['password']}',
										'{$data['autorite']}')";
										$query = $this->getPDO()->query($sql);
										return $query;
									}
								}

		
								
								public function getAdminAutorite($email)
								{
									$sql = "SELECT * FROM {$this->table} WHERE {$this->emailAdminCol}='$email'";
									$query=$this->getPDO()->query($sql)->fetch();
									return $query['autorite_admin'];
								}
								
								
								
								
								
								
								#check admin
								
								public function checkLog($data=array())
								{
									$email = $data["email"];
									$pwd = $data["pwd"];
									#composition de la requ�te sql
									$sql = "SELECT * FROM {$this->table} WHERE
									{$this->emailAdminCol}='$email' AND
									{$this->pwdAdminCol}='$pwd'";
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
							
								#READ
								public function getAllAdmin($id=null)
								{
									if($id == null)
									{
										$sql = "SELECT * FROM {$this->table}";
									}
									else
									{
										$sql = "SELECT * FROM {$this->table} WHERE
										{$this->idAdminCol}=".$id;
									}
									$query = $this->getPDO()->query($sql);
									return $query;
								}
							
								
								
								
								
								
								
								
								#DELETE
								public function deleteAdmin($id=null)
								{
									$sql = "DELETE FROM {$this->table} WHERE
									{$this->idAdminCol}=".$id;
									$query = $this->getPDO()->query($sql);
									return $query;
								}
								
								
								
								#GETTER
									public function getIdAdminCol()
									{
										return $this->idAdminCol;
									}
									
									public function getNomAdminCol()
									{
										return $this->nomAdminCol;
									}
									
									public function getUserByEmail($email)
									{
										$sql = "SELECT * FROM {$this->table} WHERE {$this->emailAdminCol}='$email'";
										$query=$this->getPDO()->query($sql)->fetch();
										
										return $query['nom_admin'];
									}

}

?>