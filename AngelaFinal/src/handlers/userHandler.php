<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_MOD.'user.php';
	require_once DIR_VIE.'userView.php';

$session = new Session();
$action = isset($_GET['a']) ? $_GET['a'] : '';
$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

$param = isset($_GET['param']) ? $_GET['param'] : '';
$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
$param = $param . '=' . $param_value;

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
				$user->setAdministratorID(2);
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
				$target_dir = $_POST['target_dir'];
				$picture = '';
				$filename = $_FILES["fileToUpload"]["name"];
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
							echo "File is an image - " . $check["mime"] . ".";
							$uploadOk = 1;
						} else {
							echo "File is not an image.";
							$uploadOk = 0;
						}
					}
					// Check if file already exists
					if (file_exists($target_file)) {
						echo "Sorry, file already exists.";
						$uploadOk = 0;
					}
					// Check file size
					if ($_FILES["fileToUpload"]["size"] > 500000) {
						echo "Sorry, your file is too large.";
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], DIR_BASE.$target_file)) {
							echo "The file ".$target_dir."". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
						} else {
							echo "Sorry, there was an error uploading your file.";
						}
					}
					
					$filename = ltrim ($target_file, '/');
					echo '<br>'.$filename;
					$picture = $filename;
				}

				$fname = filter_var ($_POST['firstName'],FILTER_SANITIZE_STRING);
				$lname = filter_var ($_POST['lastName'],FILTER_SANITIZE_STRING);
				$address = filter_var ($_POST['address'],FILTER_SANITIZE_STRING);
				$pcode = filter_var ($_POST['pcode'],FILTER_SANITIZE_STRING);
				$city = filter_var ($_POST['city'],FILTER_SANITIZE_STRING);
				$province = filter_var ($_POST['province'],FILTER_SANITIZE_STRING);

				$user = $userView->searchUsers("id",$_SESSION['userID'],'1');

				$fname = (!empty($fname) ? $fname : $user->getFirstName());
				$lname = (!empty($lname) ? $lname : $user->getLaststName());
				$address = (!empty($address) ? $address : $user->getAddress());
				$pcode = (!empty($pcode) ? $pcode : $user->getPostalCode());
				$city = (!empty($city) ? $city : $user->getCity());
				$province = (!empty($province) ? $province : $user->getProvince());
				$picture = (!empty($picture) ? $picture : $user->getPicture());
				
				$user->setIdUser($_SESSION['userID']);
				$user->setFirstName($fname);
				$user->setLastName($lname);
				$user->setAddress($address);
				$user->setCity($city);
				$user->setPostalCode($pcode);
				$user->setProvince($province);
				$user->setPicture($picture);
		
				$result = $userView->updateUser($user);
				var_dump($result);
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

				var_dump($user); echo '<br><br>';
				var_dump($result);
				
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
			if(isset($_POST['email'],$_POST['password'])){
				$email = filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL);
				$password = filter_var ($_POST['password'],FILTER_SANITIZE_STRING);
				
				$user = $userView->searchUsers("email",$email,'1');

				
				if(empty($user)) {
					echo 'email nao existe na base de dados';
				} else {
					$options = ['cost' => 7,'salt' => $user->getSalt()];	
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
							$_SESSION['loginCount']+=1;
						}
					}				
				}				
			}
    		break;
    }
    if (!empty($pageToReturn)) {
		$header = "Location:  ../../web/pages/". $pageToReturn .".php";

		var_dump($param);

		if (isset($param)) {
			$header = $header . '?' . $param;
			var_dump($header);
		}

		header($header);
		die();
	}    
}

?>