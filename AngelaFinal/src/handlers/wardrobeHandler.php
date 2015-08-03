<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_MOD.'wardrobe.php';
	require_once DIR_VIE.'wardrobeView.php';
	
$action = $_GET['a'];
if (!empty($action)) {
	

    switch ($action) {
    	case 'wardrobeAdd':
			

    		break;
		case 'list':
    		
    		break;
    }
}

?>