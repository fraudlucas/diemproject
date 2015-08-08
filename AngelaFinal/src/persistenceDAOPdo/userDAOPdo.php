<?php 
	//require_once('../config.php');
	require_once DIR_PER.'userDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'user.php';

	class UserDAOPdo implements UserDAO {
		
		public function add($user) {
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();

			$stmt = $con->prepare("INSERT INTO USERS (firstName, lastName, userName,"
							. " email, password, address, city, province, postalCode, administratorID, status)"
							. " VALUES (:firstName,:lastName,:userName, :email, :password, :address, :city, :province, :postalCode, 1,:status,3 )");
			$stmt->bindParam(':firstName', $user->getFirstName());
					$stmt->bindParam(':lastName', $user->getLastName());
					$stmt->bindParam(':userName', $user->getUserName());
					$stmt->bindParam(':email', $user->getEmail());
					$stmt->bindParam(':password',  sha1($user->getPassword()));
					$stmt->bindParam(':address', $user->getAddress());
					$stmt->bindParam(':city', $user->getCity());
					$stmt->bindParam(':province', $user->getProvince());
					$stmt->bindParam(':postalCode', $user->getPostalCode());
				   // $stmt->bindParam(':administratorID', 1  );
					
			$teste = $stmt->execute();

			return 'Sucesso - ' . $teste;
		}
		
		public function registration($user) {
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();

			$query = "INSERT INTO users (firstName, lastName, email, password,salt)"
						."VALUES (:firstName,:lastName, :email, :password,:salt)";
						
			$stmt = $con->prepare($query);			
			$stmt->bindParam(':firstName', $user->getFirstName());
			$stmt->bindParam(':lastName', $user->getFirstName());
			$stmt->bindParam(':email', $user->getEmail());
			$stmt->bindParam(':password',$user->getPassword());
			$stmt->bindParam(':salt',$user->getSalt());
			
			return $stmt->execute();
		}
		
		public function updateUser($user) {
			$className = 'ConnectionDAOPdo';
			try {		
				$con = $className::getConnection();
				$stmt = $con->prepare("UPDATE users SET 
					firstName = :fname, 
					lastName = :lname,
					address = :address,
					postalCode = :pcode,
					city = :city,
					province = :province,
					status = '2'
					WHERE id = :id");
				$stmt->bindParam(':fname', $user->getFirstName());
				$stmt->bindParam(':lname', $user->getLastName());
				$stmt->bindParam(':address', $user->getAddress());
				$stmt->bindParam(':pcode', $user->getPostalCode());
				$stmt->bindParam(':city', $user->getCity());
				$stmt->bindParam(':province', $user->getProvince());
				$stmt->bindParam(':id', $user->getIdUser());   // Bind "$email" to parameter.
				
				$stmt->execute();    // Execute the prepared query.
				echo var_dump($stmt);
				return true;
			}
			catch(PDOException $e){
				echo $e;
				return false;
			}
			
		}
		
	//	public function listAll() {
	//		$className = 'ConnectionDAOPdo';
	//		$con = $className::getConnection();
	//
	//		$stmt = $con->prepare("SELECT * FROM users");
	//		$stmt->execute();
	//		$result = $stmt->fetchAll();
	//
	//		$usersList = new ArrayObject();
	//
	//		foreach ($result as $row) {
	//			$user = new User();
	//			$user->setId($row['id']);
	//			$user->setEmail($row['email']);
	//			$user->setPassword($row['password']);
	//			$user->setRole($row['role']);
	//
	//			$usersList->append($user);
	//		}
	//
	//		return $usersList;
	//	} 
			
	 //Hugo
		public function listAll() {
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();

			$stmt = $con->prepare("SELECT * FROM users");
			$stmt->execute();
			$result = $stmt->fetchAll();

			$usersList = new ArrayObject();

			foreach ($result as $row) {
				
				$user = new User();

				$user->setIdUser($row['id']);
				$user->setUserName($row['username']);
				$user->setFirstName($row['firstName']);
				$user->setLastName($row['lastName']);
				$user->setEmail($row['email']);
				$user->setPassword($row['password']);
				$user->setAddress($row['address']);
				$user->setCity($row['city']);
				$user->setPostalCode($row['postalCode']);
				$user->setProvince($row['province']);
				$user->setAdministratorID($row['administratorID']);
				$user->setStatus($row['status']);
				$usersList->append($user);
			}

			return $usersList;
		} 
		
		public function searchUsers($param,$value,$type) {
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();
			$query = 'SELECT * FROM users Where '.$param.' = "'.$value.'"';
			$stmt = $con->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll();

			$usersList = new ArrayObject();

			foreach ($result as $row) {				
				$user = new User();
				$user->setIdUser($row['id']);
				$user->setUserName($row['username']);
				$user->setFirstName($row['firstName']);
				$user->setLastName($row['lastName']);
				$user->setEmail($row['email']);
				$user->setPassword($row['password']);
				$user->setAddress($row['address']);
				$user->setCity($row['city']);
				$user->setPostalCode($row['postalCode']);
				$user->setProvince($row['province']);
				$user->setAdministratorID($row['administratorID']);
				$user->setStatus($row['status']);
				$user->setSalt($row['salt']);
				$usersList->append($user);
			}
			
			if($type==1){
				return $user;
			}elseif($type==2){
				return $usersList;
			}
		} 
		
		public function deleteUser($id) {
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();
			$stmt = $con->prepare("UPDATE users SET status = 1 WHERE id = :id");
			$stmt->bindParam(':id', $id);   // Bind "$email" to parameter.
			$res = $stmt->execute();    // Execute the prepared query.
			
			if($res == false){
				return false;
			}else{
				return true;
			}
				
		}
	
		public function recoveryPassword($email){// gera  a hash
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();

			$key = sha1(uniqid(mt_rand(),true));

			$stmt = $con->prepare("INSERT INTO  passwordRecovery (userMail, confirmation) VALUES (:userMail, :confirmation)");
			$stmt->bindParam(':userMail', $email);
			$stmt->bindParam(':confirmation', $key);
			
			$res = $stmt->execute();
			
			return 'sucess' . $re;

		}

		public function changePassword($user, $linkHash){
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();

			// terminar esse metodo pra torocar  password 


		}

	}

?>