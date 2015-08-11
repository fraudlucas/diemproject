<?php
	//require_once(dirname(dirname( dirname( __FILE__ ) )).'/src/config.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	$homeManegementPhotosView = new ManagementPhotosView();
	$homePhotoslist = $homeManegementPhotosView->searchPhotos('pageId','1','2');
	$code = '';
	$count = 0;
	foreach ($homePhotoslist as $row) {
		$path = $row->getPathPhoto();
		$id = $row->getIdPhoto();
		$subtitle = $row->getSubtitle();	
		$status = $row->getActive();
		
		if($status == 1){
			$code .='<div class="col-md-4">
						<input type="checkbox"  id="'.$id.'" name="'.$id.'" style="margin-left: 70px;" value="Yes">
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px"></label>
						</a>
					</div>';
		}elseif($status==0){
			$code .='<div class="col-md-4">
						<input type="checkbox"  id="'.$id.'" name="'.$id.'" style="margin-left: 70px;" value="Yes">
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px"></label>
						</a>
					</div>';
		}
		
	}
?>
<div class="row">
	<div class="panel panel-default" >
		<div class="panel-heading">Manage Page Photos</div>
		<div class="panel-body">
			<div class="col-xs-9 col-md-6">
				<div class="main-box no-header clearfix">
					<div class="main-box-body clearfix">
						<div class="table-responsive">
							<form  role="form" action="../../src/handlers/managementPhotosHandler.php?a=addPhoto&b=1&p=<?php echo $pageToReturn; ?>&param=t&t=0" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="file">File</label>
									<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
								</div>
								<div class="form-group">
									<label for="text">Subtitle</label>
									<input t type="text" name="photoSubtitle" id="photoSubtitle" class="form-control">
									<label for="description">Description</label>
									<textarea class="form-control" id="description" name="description" placeholder="Type the description here" rows="3"></textarea>
								</div>
								<button class="btn btn-info" name="submit" type="submit">Upload Image</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-9 col-md-6" style="height:100% overflow-y:auto">
				<div class="row">
					<form role="form" action="../../src/handlers/managementPhotosHandler.php?b=1&p=<?php echo $pageToReturn; ?>&param=t&t=0" method="post">
						<?php echo $code;?>
						<input class="btn btn-info" name="deletePhoto" type="submit" value="delete"/>
						<input class="btn btn-info" name="desactivePhoto" type="submit" value="deactivate"/>
						<input class="btn btn-info" name="activePhoto" type="submit" value="activate"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
