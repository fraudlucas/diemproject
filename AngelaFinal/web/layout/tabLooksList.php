<?php 
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'clothingLookPiecesView.php');
	require_once (DIR_VIE.'clothesView.php');
	require_once (DIR_MOD.'clothes.php');
	$clothes = new Clothes();
	$clothesView = new ClothesView();
	$looksview = new ClothingLookPiecesView();
	$lookslist = $looksview->search('userId',$_SESSION['userID'], '2'); 
	$code = '';
	$code2 = '';
	$count = 0;
	
	foreach ($lookslist as $row) {
		$count++;
		$id = $row->getId();
		$clothe1 = $row->getClothing1Id();
		$clothe2 = $row->getClothing2Id();	
		$clothes1 = $clothesView->searchClothes('id',$clothe1, '1'); 
		$clothes2 = $clothesView->searchClothes('id',$clothe2, '1'); 
	
			$code .='<div div class="col-md-2">
						<a href="#" class="thumbnail">
							<img class="form-control" src="../../'.$clothes1->getPicture().'" style="width:150px;height:150px;" id="'.$clothe1.'">
							<img class="form-control" src="../../'.$clothes2->getPicture().'" style="width:150px;height:150px;" id="'.$clothe2.'">

						</a>
						
					</div>'
			;
		
	}
	
	echo $code;
	

?>