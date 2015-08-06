<?php
	require_once('src/config.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	$manegementPhotosView = new ManagementPhotosView();
	$list = $manegementPhotosView->searchPhotos('pageId','1','2');
	$code = '';
	$count = 0;
	foreach ($list as $row) {
		$path = $row->getPathPhoto();
		$subtitle = $row->getSubtitle();
		$status = $row->getActive();
		
		if($status == 1){
			$code .='<li>
						<img src="'.$path.'"  alt="" />
						<div class="flex-caption">							
							<p>'.$subtitle.'</p> 							
						</div>
					  </li>';
		}
					  
		
	}
?>
		<!-- start slider -->
			<!-- Slider -->
				<div id="main-slider" class="flexslider">
					<ul class="slides">
					  <?php echo $code;?>
					</ul>
				</div>
			<!-- end slider -->
			
			
			
