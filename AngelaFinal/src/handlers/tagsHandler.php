<?php
	require_once('../config.php');
	require_once('../Session.php');	
	require_once DIR_MOD.'tags.php';
	require_once DIR_VIE.'tagsView.php';
$action = $_GET['a'];
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
}

?>