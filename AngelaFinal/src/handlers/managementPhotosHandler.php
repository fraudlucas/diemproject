<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_SRC.'htmLawed.php';
	require_once DIR_MOD.'managementPhotos.php';
	require_once DIR_VIE.'managementPhotosView.php';

	if (isset($_GET['a'])){
		$action = $_GET['a'];
	}elseif(isset($_POST['desactivePhoto'])){
		$action = $_POST['desactivePhoto'];
	}elseif(isset($_POST['activePhoto'])){
		$action = $_POST['activePhoto'];
	}elseif(isset($_POST['deletePhoto'])){
		$action = $_POST['deletePhoto'];
	}

	$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

	$param = isset($_GET['param']) ? $_GET['param'] : '';
	$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
	$param = $param . '=' . $param_value;

if (!empty($action)) {
	$managementView = new ManagementPhotosView();

    switch ($action) {
    	case 'addPhoto':
			$target_dir = $_POST['target_dir'];
			var_dump($target_dir);
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
			
			$str = ltrim ($target_file, '/');
			echo '<br>'.$str;
    		$management = new ManagementPhotos();
    		$management->setPathPhoto($str);
			$management->setPageIdPhoto($_GET['b']);
			$management->setSubtitle($_POST['photoSubtitle']);
					
    		$test = $managementView->addPhotos($management);
    		break;
			
		case 'delete':
			$management = new ManagementPhotos();
			$managementlist = $managementView->searchPhotos('pageId',$_GET['b'], '2');
			
			foreach ($managementlist as $row) {
				$id = $row->getIdPhoto();
				$path = $row->getPathPhoto();	
				if(isset($_POST[$id])){
					if($_POST[$id]== 'Yes'){
						$result = $managementView->deletePhotos($id);
						if($result == true){
							echo 'eota';
							chmod(DIR_BASE.$path, 0755);
							unlink(DIR_BASE.$path);
						}
					}
				}
			}
			
			break;
			
		case 'deactivate':	
			$management = new ManagementPhotos();
			$managementlist = $managementView->searchPhotos('pageId',$_GET['b'], '2');
			
			foreach ($managementlist as $row) {
				$id = $row->getIdPhoto();
				$path = $row->getPathPhoto();	
				if(isset($_POST[$id])){
					if($_POST[$id]== 'Yes'){
						$result = $managementView->desactivePhotos($id);
						if($result == true){
							
						}
					}
				}
			}
			break;
			
		case 'updatePhoto':
			$target_dir = $_POST['target_dir'];
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
			
			$str = ltrim ($target_file, '/');
			echo '<br>'.$str;
    		$management = new ManagementPhotos();
    		$management->setPathPhoto($str);
			$management->setPageIdPhoto($_GET['b']);
			$management->setSubtitle($_POST['photoSubtitle']);
					
    		$test = $managementView->updatePhotos($management);
			break;
			
		case 'activate':
			
			$management = new ManagementPhotos();
			$managementlist = $managementView->searchPhotos('pageId',$_GET['b'], '2	');
			
			foreach ($managementlist as $row) {
				$id = $row->getIdPhoto();
				$path = $row->getPathPhoto();	
				if(isset($_POST[$id])){
					if($_POST[$id]== 'Yes'){
						$result = $managementView->activePhotos($id);
						if($result == true){
							
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