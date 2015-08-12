<?php 

require_once('../../src/config.php');
require_once('../../src/Session.php');
require_once (DIR_VIE.'managementPhotosView.php');
require_once (DIR_VIE.'managementContentView.php');
$manegementPhotosView = new ManagementPhotosView();

$managementPhotos = $manegementPhotosView->searchPhotos('pageId',$pageId,'2');
$code = '';
$flagDivider = false;
$align = 'right';
$flagAlign = true;

foreach ($managementPhotos as $key) {
	
	if($flagDivider) {
		$code.='<hr class="featurette-divider">
	';
	}
	# code...
	$code.='<div class="featurette" id="photo'.$pageId.'-'.$key->getIdPhoto().'" style="margin-bottom: 10%">
		<img class="featurette-image  img-responsive pull-'.$align.'" src="../../'.$key->getPathPhoto().'" height="300" width="350">
		<p class="lead"><strong>'.$key->getSubtitle().'</strong></p>
		<p class="">'.$key->getDescription().'</p>
	</div>
	';

	$flagDivider = true;
	$align = ($flagAlign ? 'left' : 'right');
	$flagAlign = ($flagAlign ? false : true);
}


?>


		<?php echo $code;?>