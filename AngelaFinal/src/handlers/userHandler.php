<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_MOD.'user.php';
	require_once DIR_VIE.'userView.php';

$session = new Session();
$action = $_GET['a'];

if (!empty($action)) {
	$userView = new UserView();

    switch ($action) {
		case 'registration':
			if(isset($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['password'])){
				
				//Verify if the input
				$fname = filter_var ($_POST['firstName'],FILTER_SANITIZE_STRING);
				$lname = filter_var ($_POST['lastName'],FILTER_SANITIZE_STRING);
				$email = filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL);
				$password = filter_var ($_POST['password'],FILTER_SANITIZE_STRING);
				
				//Hash the password
				$options = ['cost' => 7,'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),];				
				$password =  password_hash($password,PASSWORD_BCRYPT, $options);
				$salt = $options['salt'];
				
				//Creates new Object User				
				$user = new User();			
				$user->setFirstName($fname);
				$user->setLastName($lname);
				$user->setEmail($email);
				$user->setPassword($password);
				$user->setSalt($salt);
				$result = $userView->registration($user);
				
				if($result){
				    header('Location: ../../web/pages/userHome.php'); 	
				}else{
					header ('Location: ../../index.php');
				}
			}
			break;
			
		case 'updateUser':
			if(isset($_POST['firstName'],$_POST['lastName'],$_POST['address'],$_POST['pcode'],$_POST['city'],$_POST['province'])){
				$fname = filter_var ($_POST['firstName'],FILTER_SANITIZE_STRING);
				$lname = filter_var ($_POST['lastName'],FILTER_SANITIZE_STRING);
				$address = filter_var ($_POST['address'],FILTER_SANITIZE_STRING);
				$pcode = filter_var ($_POST['pcode'],FILTER_SANITIZE_STRING);
				$city = filter_var ($_POST['city'],FILTER_SANITIZE_STRING);
				$province = filter_var ($_POST['province'],FILTER_SANITIZE_STRING);
				
				$user = new User();
				$user->setIdUser($_SESSION['userID']);
				$user->setFirstName($fname);
				$user->setLastName($lname);
				$user->setAddress($address);
				$user->setCity($city);
				$user->setPostalCode($pcode);
				$user->setProvince($province);
		
				$result = $userView->updateUser($user);
				var_dump($result);
				if($result){
					header('Location: ../../web/pages/userHome.php'); 	
				}else{
					echo "registration failed" . $pageToReturn ."../../index.php";;
				}
			}
    		break;
			
    	case 'useradd':
    		$user = new User();
    		$user->setFirstName($_POST['firstName']);
			$user->setLastName($_POST['lastName']);
			$user->setAddress($_POST['address']);
			$user->setEmail($_POST['email']);
			$user->setCity($_POST['city']);
			$user->setUserName($_POST['username']);
			$user->setEmail($_POST['email']);
    		$user->setPassword($_POST['password']);			
    		$test = $userView->user($user);
    		break;
			
		case 'list':
			header('Location: ../clientsList.php');
    		break;
		
		case 'userdelete':
			$id = $_GET['id'];
			$res = $userView->deleteUser($id);
			header('Location: ../clientsList.php');
    		break;
			
		case 'edit':
			header('Location: ../userEdit.php');
    		break;
			
		case 'search':
			
			break;
			
		case 'logout':
			$session->logout();
			header('Location: ../../index.php');
			
			break;
			
		case 'login':
			if(isset($_POST['email'],$_POST['password'])){
				$email = filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL);
				$password = filter_var ($_POST['password'],FILTER_SANITIZE_STRING);
				
				$user = $userView->searchUsers("email",$email,'1');
				
				if (count($user)==0){
					echo 'email nao existe na base de dados';
				}else{
					$options = ['cost' => 7,'salt' => $user->getSalt(),];	
					$password =  password_hash($password,PASSWORD_BCRYPT, $options);				
					if($password == $user->getPassword()){
						$session->login($user);
						if($_SESSION['role'] == 1){
							header('Location: ../../web/pages/adminHome.php');
						}elseif($_SESSION['role'] == 2){
							if($_SESSION['status'] == 3){
								header('Location: ../../web/pages/firstLogin.php');
							}else{
								header('Location: ../../web/pages/userHome.php');
							}
						}						
					}else{
						if($_SESSION['loginCount']==3){
							
						}else{
							$_SESSION['loginCOunt']+=1;
						}
					}				
				}				
			}
    		break;
    }
}

?>
