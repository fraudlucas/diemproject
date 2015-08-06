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
	$count = 0;
	
	foreach ($wardrobeList as $row) {
		$id = $row->getId();
		$userId = $row->getUserId();
		$clothesId = $row->getClothesId();	
		$dates = $row->getDates();
		$clothes = $clothesView->searchClothes('id',$clothesId, '1'); 
		
		$code .='<div class="col-lg-3 col-md-4 col-xs-6 thumb">
						<a class="thumbnail" href="#">
							<img class="img-responsive" src="../../'.$clothes->getPicture().'" alt="" style="height:200px; weight:400px">
						</a>
					</div>';
	}
	
	echo $code;
?>

		

