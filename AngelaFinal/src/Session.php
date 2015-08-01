<?php
	
	class Session{
		private $loggedIn = false;
		private $userID;
		private $fname;
		private $lname;
		private $email;
		private $role;		
		private $status;
		
		function __construct(){
			session_start();
			$this->checkLogin();
			$this->loginCount =  $_SESSION['loginCount'] = 0;
			$this->role =  $_SESSION['role'] = 0;
		}
		
		public function isLoggedIn(){
			return $this->loggedIn;
		}
		
		public function login ($user){
			$this->userID = $_SESSION['userID'] = $user->getIdUser();
			$this->role = $_SESSION['role'] = $user->getAdministratorID();
			$this->status = $_SESSION['status'] = $user->getStatus();
			$this->fname = $_SESSION['fname'] = $user->getFirstName();
			$this->lname = $_SESSION['lname'] = $user->getLastName();
			$this->email = $_SESSION['email'] = $user->getEmail();
		}
		
		public function logout(){
			unset ($_SESSION['userID']);
			unset ($this->userID);
			$this->loggedIn = false;
		}
		
		private function checkLogin(){
			if (isset($_SESSION['userID'])){
				$this->userID = $_SESSION['userID'];
				$this->loggedIn = true;
			}else{
				unset ($this->userID);
				$this->loggedIn = false;
			}
		}
	}
?>
