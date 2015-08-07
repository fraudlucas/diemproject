<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_MOD.'clothes.php';
	require_once DIR_VIE.'clothesView.php';
$action = $_GET['a'];
if (!empty($action)) {
	$clothesView = new ClothesView();

    switch ($action) {
    	case 'clothesAdd':
			//$target_dir = $_POST['target_dir'];
			$target_dir = '/web/assets/img/clothes/';
			var_dump($target_dir);
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			var_dump($target_file);
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
    		$clothes = new Clothes();
    		$clothes->setPicture($str);
			$clothes->setCode($_POST['code']);
			$clothes->setPrice($_POST['price']);
			// $clothes->setType($_POST['type']);
			$clothes->setTypeId(2);
			/*if($_POST['customized']=='Yes'){
				$clothes->setCustomized(1);
			}else{
				$clothes->setCustomized(0);
			}*/
			$clothes->setCustomized($_POST['customized']);
								
    		$test = $clothesView->add($clothes);

    		echo $test;

    		break;
		case 'list':
    		$list = $clothesView->listClothes();
			header('Location: ../test.php');
    		break;
    }
}

?>