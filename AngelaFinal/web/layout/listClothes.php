 <?php
	require_once (DIR_VIE.'clothesView.php');
	$clothesView = new ClothesView();
	$list = $clothesView->listAll();
	$code ='';
	foreach ($list as $row) {
		$id = $row->getId();
		$picture = $row->getPicture();
		
				
		$code .='<div class="col-md-2">				
							<a href="#" class="thumbnail">
								<img class="img-responsive img-thumbnail" src="../../'.$picture.'" alt="Pulpit Rock" style="width:150px;height:150px">
							</a>
						</div>	';
		 
	}
	echo $code;
 ?>

                               