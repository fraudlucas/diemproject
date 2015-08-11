<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_SRC.'htmLawed.php';
	require_once DIR_MOD.'managementContent.php';
	require_once DIR_MOD.'color.php';
	require_once DIR_MOD.'logo.php';
	require_once DIR_VIE.'managementContentView.php';
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
    		
    		if(isset($_POST['logo'])){
				
    			$logo = ($_POST['logo']);
    			$upLogo = new ManagementContent();
    			$upLogo->setLogo($logo);
				$test = $managementView->updateLogo($upLogo);
				//header('Location: ../../web/pages/adminManagement.php');
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