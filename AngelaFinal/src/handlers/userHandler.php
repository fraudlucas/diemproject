<?php
require_once('../config.php');
require_once('../Session.php');	
require_once DIR_MOD.'user.php';
require_once DIR_VIE.'userView.php';
require_once DIR_VIE.'managementContentView.php';
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_WARNING);


$session = new Session();
$action = isset($_GET['a']) ? $_GET['a'] : '';
$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

$param = isset($_GET['param']) ? $_GET['param'] : '';
$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
$param = $param . '=' . $param_value;

if (!empty($action)) {
	$userView = new UserView();
	$managementContentView = new ManagementContentView();

    switch ($action) {
    	case 'recoveryPassword':
			if(isset($_POST['email'])){
				$email =  filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

				$user = $userView->searchUsers("email",$email,'1');

				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				if (is_null($user)) {
					$message  = 'There is no account registered using this email.';
					$_SESSION['msgUser'] =  $message;
					// var_dump($user);
					header('Location: ../../index.php');
					break;
				}

				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				if(empty($user)) {
					$message  = 'There is no account registered using this email.';
					$_SESSION['msgUser'] =  $message;
					// var_dump($user);
					header('Location: ../../index.php');
					break;
				} else {

					$msg  = 'An email was sent to your email account.';
					$_SESSION['msgSuccess'] =  $msg;

					$password = rand(100000,9999999);
					$key = $password;
					$options = ['cost' => 7,'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),];				
					$password =  password_hash($password,PASSWORD_BCRYPT, $options);
					$salt = $options['salt'];
					$message = 'Your new password is '. $key;
					$from = $managementContentView->searchEmail(1);
					$headers = "From: ". $from . "\r\n";
					$test = mail($email, 'Password recovery', $message, $headers);
					header('Location: ../../index.php');
					
					// if ($test) {
					// 	echo 'funfou';
					// }else{
					// 	echo 'pqp';
					// }

					// var_dump($test); 
					// echo $key;
					
					$user = new User();

					$user->setEmail($email);
					$user->setPassword($password);
					$user->setSalt($salt);
					// var_dump($user);

					$result = $userView->recoveryPassword($user);
			}
		}
			break;

		case 'registration':
			if(isset($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['password'])){
				
				//Verify if the input
				$fname = filter_var ($_POST['firstName'],FILTER_SANITIZE_STRING);
				$lname = filter_var ($_POST['lastName'],FILTER_SANITIZE_STRING);
				$email = filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL);
				$password = filter_var ($_POST['password'],FILTER_SANITIZE_STRING);

				$user = $userView->searchUsers("email",$email,'1');
				$emailTocheck = (empty($user) ? '' : $user->getEmail());				

				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				if ($emailTocheck == $email) {
					//echo 'There is already an account registered using this email.'; 
					$message  = 'There is already an account registered using this email.';
					$_SESSION['msgUser'] =  $message;
					header('Location: ../../index.php');
					break;
				}
				
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
				$user->setAdministratorID(2);
				$result = $userView->registration($user);
				
				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				if($result){
					
					$msg  = 'You were successfully registered! Welcome!';
					$_SESSION['msgSuccess'] =  $msg;

					$subject = "Registration Agela Mark";
					$message = "Hi " . $fname . "! You were successfully registered! Welcome!";
					$from = $managementContentView->searchEmail(1);
					$headers = "From: ". $from . "\r\n";
					mail($email, $subject, $message, $headers);
					header('Location: ../../index.php'); 
				}else{
					header ('Location: ../../index.php');
				}
				
			}
			break;
			
		case 'updateUser':
			if(isset($_POST['firstName'],$_POST['lastName'],$_POST['address'],$_POST['pcode'],$_POST['city'],$_POST['province'])){
				$target_dir = (!empty($_POST['target_dir']) ? $_POST['target_dir'] : '');
				$picture = '';
				$filename = (!empty($_FILES["fileToUpload"]["name"]) ? $_FILES["fileToUpload"]["name"] : '');

				if (!empty($filename)) {
					if (!file_exists(DIR_BASE.$target_dir)) {
						mkdir(DIR_BASE.$target_dir, 0700, true);
					}
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_POST["submit"])) {
						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
						if($check !== false) {
							$msg = "File is an image - " . $check["mime"] . ".";
							$_SESSION['msgUser'] =  $msg;
							$uploadOk = 1;
						} else {
							$msg = "File is not an image.";
							$_SESSION['msgUser'] =  $msg;
							$uploadOk = 0;
						}
					}
					// Check if file already exists
					if (file_exists($target_file)) {
						$msg = "Sorry, file already exists.";
						$_SESSION['msgUser'] =  $msg;
						$uploadOk = 0;
					}
					// Check file size
					if ($_FILES["fileToUpload"]["size"] > 500000) {
						$msg = "Sorry, your file is too large. The maximum size accepted is 500kb.";
						$_SESSION['msgUser'] =  $msg;
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						$msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$_SESSION['msgUser'] =  $msg;
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$msg = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], DIR_BASE.$target_file)) {
							$msg = "The file ".$target_dir."". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
						} else {
							$msg = "Sorry, there was an error uploading your file.";
							$_SESSION['msgUser'] =  $msg;
						}
					}
					
					$filename = ltrim ($target_file, '/');
					// echo '<br>'.$filename;
					$picture = $filename;
				}

				$fname = filter_var ($_POST['firstName'],FILTER_SANITIZE_STRING);
				$lname = filter_var ($_POST['lastName'],FILTER_SANITIZE_STRING);
				$address = filter_var ($_POST['address'],FILTER_SANITIZE_STRING);
				$pcode = filter_var ($_POST['pcode'],FILTER_SANITIZE_STRING);
				$city = filter_var ($_POST['city'],FILTER_SANITIZE_STRING);
				$province = filter_var ($_POST['province'],FILTER_SANITIZE_STRING);
				$password = filter_var ($_POST['password'], FILTER_SANITIZE_STRING);
				$salt = "";

				$user = $userView->searchUsers("id",$_SESSION['userID'],'1');

				$fname = (!empty($fname) ? $fname : $user->getFirstName());
				$lname = (!empty($lname) ? $lname : $user->getLaststName());
				$address = (!empty($address) ? $address : $user->getAddress());
				$pcode = (!empty($pcode) ? $pcode : $user->getPostalCode());
				$city = (!empty($city) ? $city : $user->getCity());
				$province = (!empty($province) ? $province : $user->getProvince());
				$picture = (!empty($picture) ? $picture : $user->getPicture());

				if (!empty($password)) {
					// echo "entrou no if";
					
					$options = ['cost' => 7,'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),];				
					$password =  password_hash($password,PASSWORD_BCRYPT, $options);
					$salt = $options['salt'];
				}else{
					// echo "entrou  no else";
					$password = $user->getPassword();
					$salt  = $user->getSalt();
				}
				
				$user->setIdUser($_SESSION['userID']);
				$user->setFirstName($fname);
				$user->setLastName($lname);
				$user->setAddress($address);
				$user->setCity($city);
				$user->setPostalCode($pcode);
				$user->setProvince($province);
				$user->setPicture($picture);
				$user->setPassword($password);
				$user->setSalt($salt);
		
				$result = $userView->updateUser($user);
				// var_dump($result);

				if ($user->getStatus() == 3) $userView->undeleteUser($id);
				// if($result){
				// 	header('Location: ../../web/pages/userHome.php'); 	
				// }else{
				// 	echo "registration failed";
				// }
			}
    		break;
			
    	case 'addStaff':
    		if(isset($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['password'])){
				
				//Verify if the input
				$fname = filter_var ($_POST['firstName'],FILTER_SANITIZE_STRING);
				$lname = filter_var ($_POST['lastName'],FILTER_SANITIZE_STRING);
				$email = filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL);
				$password = filter_var ($_POST['password'],FILTER_SANITIZE_STRING);

				$user = $userView->searchUsers("email",$email,'1');
				$emailTocheck = (empty($user) ? '' : $user->getEmail());				

				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				if ($emailTocheck == $email) {
					
					$message  = 'There is already an account registered using this email.';
					$_SESSION['msgUser'] =  $message;
					//header('Location: ../../index.php');
					break;
				}
				
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
				$user->setAdministratorID(3);
				$result = $userView->registration($user);

				// var_dump($user); echo '<br><br>';
				// var_dump($result);
				
				// if($result){
				// 	header('Location: ../../web/pages/adminStaff.php'); 
				// }else{
				// 	header ('Location: ../../index.php');
				// }
				
			}
    		break;
			
		case 'list':
			header('Location: ../clientsList.php');
    		break;
		
		case 'userdelete':
			$id = $_GET['id'];
			$res = $userView->deleteUser($id);
			// header('Location: ../../web/pages/adminClients.php');
			// die();
    		break;

    	case 'userundelete':
			$id = $_GET['id'];
			$res = $userView->undeleteUser($id);
			// header('Location: ../../web/pages/adminClients.php');
			// die();
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
			//echo " --- passou no case p login";
			if(isset($_POST['email'],$_POST['password'])){
				$email = filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL);
				$password = filter_var ($_POST['password'],FILTER_SANITIZE_STRING);
				
				$user = $userView->searchUsers("email",$email,'1');

				//var_dump($user);

				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				if (is_null($user)) {
					echo 'There is no account registered using this email.';
					$message  = 'There is no account registered using this email.';
					$_SESSION['msgUser'] =  $message;
					header('Location: ../../index.php');
					break;
				}

				// var_dump($user);

				if (empty($user)) {
					//echo 'There is no account registered using this email.';
					$message  = 'There is no account registered using this email.';
					$_SESSION['msgUser'] =  $message;
					header('Location: ../../index.php');
					break;
				}

				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				if ($user->getStatus() == 1) {
					//echo 'Your account has been deactivated. You must contact the Administrator.';
					$message  = 'Your account has been deactivated. You must contact the Administrator.';
					$_SESSION['msgUser'] =  $message;
					header('Location: ../../index.php');
					break; // If the user is inactive, cannot perform login.
				}

				/*
				* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
				*/
				// echo "<br> to aqui antes d ver a senha"; 
				if(empty($user)) {
					// echo "<br> entrei no empty(var)";
					$message  = 'There is no account registered using this email.';
					$_SESSION['msgUser'] =  $message;
					header('Location: ../../index.php');
				} else {
					// echo "<br> to aqui antes d testar a senha";
					// var_dump($password);
					// echo "<br>";
					$options = ['cost' => 7,'salt' => $user->getSalt()];
					// var_dump($options);
					// var_dump($password);
					// echo "<br> ------";
					// echo password_hash($password,PASSWORD_BCRYPT, $options);
					$password =  password_hash($password,PASSWORD_BCRYPT, $options);
					// var_dump($password);	
					// echo "<br> to aqui antes d testar a senha";		
					if($password == $user->getPassword()){
						$session->login($user);
						// echo "<br><br>Joguei na sessao";
						if($_SESSION['role'] == 1){
							// echo " ---- cheguei p redirecionar";
							header('Location: ../../web/pages/adminHome.php');
						}elseif($_SESSION['role'] == 2){
							if($_SESSION['status'] == 3){
								header('Location: ../../web/pages/firstLogin.php');
							}else{
								header('Location: ../../web/pages/userHome.php');
							}
						} elseif($_SESSION['role'] == 3){
							if($_SESSION['status'] == 3){
								header('Location: ../../web/pages/firstLogin.php');
							}else{
								header('Location: ../../web/pages/staffHome.php');
							}
						}						
					}else{
						if($_SESSION['loginCount']==3){
							// echo " --- aqui quase";
						}else{
							/*
							* JOGAR NA SESSAO E SER CAPTURADA NA PAGINA. A MSG ABAIXO.
							*/
							$_SESSION['loginCount']+=1;
							$message = 'Your password is not correct.';
							$_SESSION['msgUser'] =  $message;
							header('Location: ../../index.php');
						}
					}				
				}				
			}
    		break;

    	case 'contactMessage':
			if($_POST && isset($_POST['submit'], $_POST['name'], $_POST['email'], $_POST['message'])) {

				$name = $_POST['name'];
				$email = $_POST['email'];
				$message = $_POST['message'];

				$message = 'Name: ' . $name . '\r\n' . 'Email: ' . $email . '\r\n' . 'Message: ' . $message . '\r\n';

				$from = $managementContentView->searchEmail(1);
				$to = $managementContentView->searchEmail(2);
				$subject = 'Contact from website (CONTACT FORM)';
				$headers = "From: ". $from . "\r\n";
				mail($to, $subject, $message, $headers);
			 
			}
			
			break;

		case 'careerMessage':
			if($_POST && isset($_POST['submit'], $_POST['name'], $_POST['email'], $_POST['message'])) {

				$name = $_POST['name'];
				$email = $_POST['email'];
				$message = $_POST['message'];

				$message = 'Name: ' . $name . '\r\n' . 'Email: ' . $email . '\r\n' . 'Message: ' . $message . '\r\n';

				$from = $managementContentView->searchEmail(1);
				$to = $managementContentView->searchEmail(3);
				$subject = 'Contact from website (CAREER FORM)';
				$headers = "From: ". $from . "\r\n";
				mail($to, $subject, $message, $headers);
			 
			}
			
			break;
    }
    if (!empty($pageToReturn)) {
		$header = "Location:  ../../web/pages/". $pageToReturn .".php";

		// var_dump($param);

		if (isset($param)) {
			$header = $header . '?' . $param;
			// var_dump($header);
		}

		header($header);
		die();
	}    
}

?>