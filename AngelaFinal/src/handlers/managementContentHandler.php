<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_SRC.'htmLawed.php';
	require_once DIR_MOD.'managementContent.php';
	require_once DIR_MOD.'color.php';
	// require_once DIR_MOD.'logo.php';
	require_once DIR_VIE.'managementContentView.php';
	error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_WARNING);
//require_once dirname(dirname(__FILE__)).'\..\registration.php';

$action = $_GET['a'];
if(isset($_GET['b'])){
	$page = $_GET['b'];
}
$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

$param = isset($_GET['param']) ? $_GET['param'] : '';
$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
$param = $param . '=' . $param_value;

if (!empty($action)) {
	$managementView = new ManagementContentView();

    switch ($action) {

		case 'addContent':	
			if(isset($_POST['content'])){
				$content = $_POST['content'];
				$processed = htmLawed($content); 
				$management = new ManagementContent();
				$management->setPageIdContent($page);
				$management->setVariable('test');
				$management->setContent($processed);
				$test = $managementView->addContent($management);
			}
			break;
			
		case 'updateContent':
			if(isset($_POST['content'])){
				$content = $_POST['content'];
				$processed = htmLawed($content); 
				$management = new ManagementContent();
				$management->setPageIdContent($page);
				$management->setContent($processed);
				$test = $managementView->updateContent($management);
			}
			break;
    	case'changeColor': 
    		
    		if(isset($_POST['color'])){
				
    			$color = ($_POST['color']);
    			$upColor = new ManagementContent();
    			$upColor->setColor($color);
				$test = $managementView->updateColor($upColor);
				//header('Location: ../../web/pages/adminManagement.php');
    		}
			break;

		case'changeLogo': 
    		
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
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					$msg = "Sorry, your file is too large. The maximum size accepted is 500kb.";
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
					$_SESSION['msgUser'] =  $msg;
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

       			$upLogo = new ManagementContent();
    			$upLogo->setLogo($picture);
				$test = $managementView->updateLogo($upLogo);
				//header('Location: ../../web/pages/adminManagement.php');
    		}

		break;

		case 'changeEmail': 
    			$email1 = ($_POST['email1']);
    			$email2 = ($_POST['email2']);
    			$email3 = ($_POST['email3']);

				$managementView->updateEmail($email1, 1);
				$managementView->updateEmail($email2, 2);
				$managementView->updateEmail($email3, 3);
		break;

		case'changeLinks': 
    		
    		$link1 = ($_POST['link1']);
    		$link2 = ($_POST['link2']);
				
    		$uplink = new ManagementContent();
    		$uplink->setContent($link1);
    		$uplink->setVariable('link');
    		$uplink->setPageIdContent(11);
			$test = $managementView->updateContent($uplink);

			$uplink->setContent($link2);
    		$uplink->setPageIdContent(12);
			$test = $managementView->updateContent($uplink);
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