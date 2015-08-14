<?php 
require_once('../../src/config.php');
require_once('../../src/Session.php');
require_once (DIR_VIE.'clothesView.php');
require_once (DIR_VIE.'wardrobeView.php');
require_once (DIR_VIE.'tagsView.php');
require_once (DIR_MOD.'clothes.php');

$session = new Session();

$filter = isset($_GET['f']) ? $_GET['f'] : '';
$wardrobe = isset($_GET['w']) ? $_GET['w'] : '';

if (!empty($wardrobe)) {
	$clothes = new Clothes();
	$clothesView = new ClothesView();
	$tagView = new TagsView();
	$wardrobeView = new WardrobeView();

	$code = '';

	$tag = $tagView->searchTag($filter);

	switch ($wardrobe) {
		case '2':
			# code...
			$wardrobeList = $wardrobeView->searchWardrobe('userId',$_SESSION['userID'], '2'); 

			foreach ($wardrobeList as $row) {
				$id = $row->getId();
				$userId = $row->getUserId();
				$clothesId = $row->getClothesId();	
				$dates = $row->getDates();
				$clothes = $clothesView->searchClothes('id',$clothesId, '1');

				if ($clothes->getTagId() != 0 && $clothes->getTagId() != $filter && $filter != 0) {
					# code...
					continue;
				}
				
				$tag = $tagView->searchTag($clothes->getTagId());
				$typeID = $clothes->getTypeId();
				$type = ($typeID == 1 ? 'Top' : ($typeID == 2 ? 'Bottom' : 'Dress'));
				$price = $clothes->getPrice();
				$customizedId = $clothes->getCustomized();
				$customized = ($customizedId == 2 ? 'No' : 'Yes');
				$tag2 = $tagView->searchTag($clothes->getTagId());

				
				$code .='<div class="col-lg-3 col-md-4 col-xs-6 thumb">
								<a class="thumbnail" href="#" data-toggle="modal" data-target="#showClothesModal" data-value="'.$clothesId.'">
									<img class="img-responsive" src="../../'.$clothes->getPicture().'" alt="" style="height:200px; weight:400px" >
								</a>
								<input type="hidden" id="tag'.$clothesId.'" value="'.$tag2->getName().'">
								<input type="hidden" id="tagId'.$clothesId.'" value="'.$tag2->getId().'">
								<input type="hidden" id="typeId'.$clothesId.'" value="'.$typeID.'">
								<input type="hidden" id="type'.$clothesId.'" value="'.$type.'">
								<input type="hidden" id="price'.$clothesId.'" value="'.$price.'">
								<input type="hidden" id="customizedId'.$clothesId.'" value="'.$customizedId.'">
								<input type="hidden" id="customized'.$clothesId.'" value="'.$customized.'">
								<input type="hidden" id="picture'.$clothesId.'" value="../../'.$clothes->getPicture().'">
								<input type="hidden" id="code'.$clothesId.'" value="'.$clothes->getCode().'">

							</div>';
			}

			break;

		case '1':
			# Filtering the collection's clothes.
			$list = '';
			if ($filter == 0) {
				$list = $clothesView->listAll();
			} else {
				$list = $clothesView->searchClothes('tagID',$tag->getId(),'2');	
			}

			foreach ($list as $row) {
				$id = $row->getId();
				$picture = $row->getPicture();	
				$typeID = $row->getTypeId();
				$type = ($typeID == 1 ? 'Top' : ($typeID == 2 ? 'Bottom' : 'Dress'));
				$price = $row->getPrice();
				$customizedId = $row->getCustomized();
				$customized = ($customizedId == 2 ? 'No' : 'Yes');
				$tag2 = $tagView->searchTag($row->getTagId());

				$icon = '<a href="#" title="Add to your Wardrobe" data-toggle="modal" data-target="#addToWardrobeModal" data-value="'.$id.'">
										<span class="fa-stack">
											<i class="fa fa-square fa-stack-2x"></i>
											<i class="fa fa-plus fa-stack-1x fa-inverse"></i>
										</span>
									</a>';

				if ($wardrobeView->checkClothesInWardrobe($id,$_SESSION['userID'])) {
					$icon = '<a href="#" title="It is already added!">
										<span class="fa-stack">
											<i class="fa fa-square fa-stack-2x fa-inverse"></i>
											<i class="fa fa-check fa-stack-1x"></i>
										</span>
									</a>';
				}
						
				$code .='<div class="col-md-2">				
									<a href="#" class="thumbnail" data-toggle="modal" data-target="#showClothesModal" data-value="'.$id.'">
										<img class="img-responsive img-thumbnail" src="../../'.$picture.'" alt="Pulpit Rock" style="width:150px;height:150px">
									</a>
									<center>'.$icon.'</center>
									<input type="hidden" id="tag'.$id.'" value="'.$tag2->getName().'">
									<input type="hidden" id="tagId'.$id.'" value="'.$tag2->getId().'">
									<input type="hidden" id="typeId'.$id.'" value="'.$typeID.'">
									<input type="hidden" id="type'.$id.'" value="'.$type.'">
									<input type="hidden" id="price'.$id.'" value="'.$price.'">
									<input type="hidden" id="customizedId'.$id.'" value="'.$customizedId.'">
									<input type="hidden" id="customized'.$id.'" value="'.$customized.'">
									<input type="hidden" id="picture'.$id.'" value="'.$picture.'">
									<input type="hidden" id="code'.$id.'" value="'.$row->getCode().'">
								</div>	';
				 
			}

			break;
		
		default:
			# code...
			break;
	}

	if (empty($code)) {
		echo 'There is no clothes tagged as "' . $tag->getName() . '".';
	}
	echo $code;

}

?>