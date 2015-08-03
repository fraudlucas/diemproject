<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_SRC.'htmLawed.php';
	require_once DIR_MOD.'managementContent.php';
	require_once DIR_MOD.'color.php';
	require_once DIR_VIE.'managementContentView.php';
//require_once dirname(dirname(__FILE__)).'\..\registration.php';

$action = $_GET['a'];
if(isset($_GET['b'])){
	$page = $_GET['b'];
}

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
    	case'changeColor': //me perdi!! pra  onde eh  que  eu vou com isso! 
    		
    		if(isset($_POST['color'])){
				//$management = new managementContent();
    			$color = ($_POST['color']);
    			$upColor = new ManagementContent();
    			$upColor->setColor($color);
				echo $color ." in Handler";
				echo "test here" . $upColor->getColor() . "in HANDLER UP" ;
				$test = $managementView->updateColor($upColor);
				echo $test;
    		}
		break;
	}	


}

?>