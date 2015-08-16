<?php
require_once('../config.php');
require_once('../Session.php');	
require_once DIR_MOD.'clothingLookPieces.php';
require_once DIR_VIE.'clothingLookPiecesView.php';
$session = new Session();
$action = $_GET['a'];


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

   
}

?>