<?php
require_once('../config.php');
require_once('../Session.php');	
require_once DIR_MOD.'clothingLookPieces.php';
require_once DIR_VIE.'clothingLookPiecesView.php';
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_WARNING);


$session = new Session();
$action = isset($_GET['a']) ? $_GET['a'] : '';
$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

$param = isset($_GET['param']) ? $_GET['param'] : '';
$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
$param = $param . '=' . $param_value;


if (!empty($action)) {
	$clothesView = new ClothingLookPiecesView();

    switch ($action) {
    	case 'clothesAdd':

			$look = new clothingLookPieces();
			$look->setClothing1Id($_POST['clothe1']);
			$look->setClothing2Id($_POST['clothe2']);
			$look->setUserId($_SESSION['userID']);
			$clothesView->add($look);
			
			
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