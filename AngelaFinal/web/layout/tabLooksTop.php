<?php 
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'wardrobeView.php');
	require_once (DIR_VIE.'clothesView.php');
	require_once (DIR_MOD.'clothes.php');
	$clothes = new Clothes();
	$clothesView = new ClothesView();
	$wardrobeView = new WardrobeView();
	$wardrobeList = $wardrobeView->searchWardrobe('userId',$_SESSION['userID'], '2'); 
	$code = '';
	$code2 = '';
	$count = 0;
	
	foreach ($wardrobeList as $row) {
		$count++;
		$id = $row->getId();
		$userId = $row->getUserId();
		$clothesId = $row->getClothesId();	
		$dates = $row->getDates();
		$clothes = $clothesView->searchClothes('id',$clothesId, '1'); 
		if ($clothes->getTypeId()== 1){
			$code .='<img src="../../'.$clothes->getPicture().'" style="width:200px;height:140px;"id="drag'.$count.'" draggable="true" ondragstart="drag(event)" >';
		}
	}
	
	echo $code;
	

?>
	