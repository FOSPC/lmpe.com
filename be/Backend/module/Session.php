<?php
	
	class Session{
		
						private $sessionName;
						private $sessionValue;
						
						
						#creation de la session
						public function setSession($data=array()){
							$_SESSION[  $data["name"]   ] = $data["value"];
						}
						
						
						
						#destruction de la session
						public function destructSession(){
							session_unset();
							session_destroy();
						}
						
						
						public function getSession($index){
							if(isset($_SESSION[$index])){
								return $_SESSION[$index];
							}else{
								return "Session Introuvable !";
							}
	
						}
						
						public function checkSession($index){
							if(isset($_SESSION[$index])){
								return true;
							}else{
								return false;
							}
						}
						public function getSessionInfo(){
							
							$email=$this->getSession("email");
							
							$admin = new Admin();
							$datainfo=$admin->getUserByEmail($email);
							return $datainfo;
						}
						
						public function getSessionInfoUser(){
								
							$email=$this->getSession("email");
							include_once 'model/user.php';
							$user=new User();
							$datainfo=$user->getUserByEmail($email);
							return $datainfo;
						}
	}
?>