<?php
require_once('../config.php');
require_once('../Session.php');	
require_once DIR_MOD.'wardrobe.php';
require_once DIR_VIE.'wardrobeView.php';
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE);
$session = new Session();
	
$action = $_GET['a'];

$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

$param = isset($_GET['param']) ? $_GET['param'] : '';
$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
$param = $param . '=' . $param_value;

if (!empty($action)) {
	$wardrobeView = new WardrobeView();

    switch ($action) {
    	case 'wardrobeAdd':
			$clothesID = $_POST['id'];
			$userID = $_SESSION['userID'];

			$wardrobe = new Wardrobe();
			$wardrobe->setUserId($userID);
			$wardrobe->setClothesId($clothesID);

			echo $wardrobeView->add($wardrobe);

    		break;
		case 'list':
    		
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