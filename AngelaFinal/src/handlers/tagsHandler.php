<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_MOD.'tags.php';
	require_once DIR_VIE.'tagsView.php';
$action = $_GET['a'];
$pageToReturn = $_GET['p'];

$param = $_GET['param'];
$param_value = $_GET[$param];
$param = $param . '=' . $param_value;

if (!empty($action)) {
	$tagsView = new TagsView();

    switch ($action) {
    	case 'tagsAdd':
			if(isset($_POST['tagName'])){
				$name = $_POST['tagName'];
				$tags = new Tags();
				$tags->setName($name);
				$test = $tagsView->add($tags);
			}
    		break;
			
		case 'list':
    		$list = $clothesView->listClothes();
			header('Location: ../test.php');
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