<?php
require_once('../config.php');
require_once('../Session.php');	
require_once DIR_MOD.'clothes.php';
require_once DIR_VIE.'clothesView.php';
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_WARNING);

$action = isset($_GET['a']) ? $_GET['a'] : '';
$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

$param = isset($_GET['param']) ? $_GET['param'] : '';
$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
$param = $param . '=' . $param_value;

if (!empty($action)) {
	$clothesView = new ClothesView();

    switch ($action) {
    	case 'clothesAdd':
			//$target_dir = $_POST['target_dir'];
			$target_dir = '/web/assets/img/clothes/';
			// // var_dump($target_dir);
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			// // var_dump($target_file);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$_SESSION['msgUser'] =  $msg;
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$_SESSION['msgUser'] =  $msg;
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
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
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$_SESSION['msgUser'] =  $msg;
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
    		$clothes = new Clothes();
    		$clothes->setPicture($str);
			$clothes->setCode($_POST['code']);
			$clothes->setPrice($_POST['price']);
			$clothes->setTypeId($_POST['type']);
			$clothes->setCustomized($_POST['customized']);
			$clothes->setTagId($_POST['tag']);
								
    		$test = $clothesView->add($clothes);

    		echo $test;

    		break;
		case 'list':
    		$list = $clothesView->listClothes();
			header('Location: ../test.php');
    		break;

    	case 'updateClothes':
		
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


			$clothes = $clothesView->searchClothes('id',$_POST['id'], '1');
			// var_dump($clothes);
			$picture = (!empty($picture) ? $picture : $clothes->getPicture());
			
			$clothes->setPicture($picture);
			$clothes->setCode($_POST['code']);
			$clothes->setPrice($_POST['price']);
			$clothes->setTypeId($_POST['type']);
			$clothes->setCustomized($_POST['customized']);
			$clothes->setTagId($_POST['tag']);

			// var_dump($clothes);
	
			$result = $clothesView->updateClothes($clothes);
			// var_dump($result);
			// if($result){
			// 	header('Location: ../../web/pages/userHome.php'); 	
			// }else{
			// 	echo "registration failed";
			// }
			
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