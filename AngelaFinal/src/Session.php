<?php
	
	class Session{
		const SESSION_STARTED = true;
		const SESSION_NOT_STARTED = false;

		private $loggedIn = false;
		private $userID;
		private $fname;
		private $lname;
		private $email;
		private $role;		
		private $status;
		private $sessionState;
		
		function __construct(){
		if ($this->sessionState == self::SESSION_NOT_STARTED ) {
			session_start();
			$this->sessionState = self::SESSION_STARTED;
		}
			$this->checkLogin();
			$this->loginCount =  $_SESSION['loginCount'] = 0;
			
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
			// unset ($_SESSION['userID']);
			// unset ($this->userID);
			// $this->loggedIn = false;
			session_destroy();
			$this->sessionState = SESSION_NOT_STARTED;
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