<?php
	//require_once(dirname(dirname( dirname( __FILE__ ) )).'/src/config.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	$homeManegementPhotosView = new ManagementPhotosView();
	$homePhotoslist = $homeManegementPhotosView->searchPhotos('pageId','1','2');
	$code = '';
	$count = 0;
	$target_dir = 'web/assets/img/index/';
	foreach ($homePhotoslist as $row) {
		$path = $row->getPathPhoto();
		$id = $row->getIdPhoto();
		$subtitle = $row->getSubtitle();
		$description = $row->getDescription();	
		$status = $row->getActive();
		
		if($status == 1){
			$code .='<div class="col-md-4">
						<input type="checkbox"  id="'.$id.'" name="'.$id.'" style="margin-left: 70px;" value="Yes">
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px"></label>
							
						</a>
						<span class="label label-success">Active</span>
						';
		}elseif($status==0){
			$code .='<div class="col-md-4">
						<input type="checkbox"  id="'.$id.'" name="'.$id.'" style="margin-left: 70px;" value="Yes">
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px"></label>
							
						</a>
						<span class="label label-danger">Inactive</span>
						';
		}
		$code .= '<a href="#" title="Edit Picture" data-toggle="modal" data-target="#indexEditPictureModal" data-value="'.$id.'">
							<span class="fa-stack">
								<i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</div>
					';
		$code.='<input type="hidden" id="subtitle'.$id.'" name="subtitle'.$id.'" value="'.$subtitle.'">
					<input type="hidden" id="description'.$id.'" name="description'.$id.'" value="'.$description.'">
					<input type="hidden" id="status'.$id.'" name="status'.$id.'" value="'.$status.'">
					<input type="hidden" id="path'.$id.'" name="path'.$id.'" value="../../'.$path.'">
					<input type="hidden" id="id'.$id.'" name="id'.$id.'" value="../../'.$path.'">
					<input type="hidden" name="target_dir'.$id.'" id="target_dir'.$id.'" value="'.$target_dir.'">
					';
		
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
									<input t type="text" name="photoSubtitle" id="photoSubtitle" class="form-control" placeholder="Subtitle" maxlength="80">
									<label for="description">Description</label>
									<textarea class="form-control" id="description" name="description" placeholder="Type the description here" rows="3" maxlength="200"></textarea>
								</div>
								<input type="hidden" name="target_dir" id="target_dir" class="form-control" value="<?php echo $target_dir; ?>">
								<button class="btn btn-info" name="submit" type="submit">Upload Image</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-9 col-md-6" style="height:100% overflow-y:auto">	
				<form role="form" action="../../src/handlers/managementPhotosHandler.php?b=1&p=<?php echo $pageToReturn; ?>&param=t&t=0" method="post">
					<div class="row">
						<?php echo $code;?>
					</div>
						
					<div class="row">
						<input class="btn btn-info" name="deletePhoto" type="submit" value="delete"/>
						<input class="btn btn-info" name="desactivePhoto" type="submit" value="deactivate"/>
						<input class="btn btn-info" name="activePhoto" type="submit" value="activate"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="indexEditPictureModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Picture</h4>
			</div>
			<div class="modal-body">
				<form  role="form" action="../../src/handlers/managementPhotosHandler.php?a=updatePhoto&p=<?php echo $pageToReturn; ?>&param=t&t=0" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" name="fileToUpload" id="indexFileToUpload" class="form-control">
						<img id="indexImage" class="img-responsive" src="" style="width:150px;height:150px">
					</div>
					<div class="form-group">
						<label for="text">Subtitle</label>
						<input type="text" name="photoSubtitle" id="indexPhotoSubtitle" class="form-control" placeholder="Subtitle" maxlength="80">
						<label for="description">Description</label>
						<textarea class="form-control" id="indexDescription" name="description" placeholder="Type the description here" rows="3" maxlength="200"></textarea>
					</div>
					<input type="hidden" name="target_dir" id="indexTarget_dir" class="form-control" value="">
					<input type="hidden" name="id" id="indexId" class="form-control" value="">
					<button class="btn btn-info" name="submit" type="submit">Update</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div> 

<script>
	$(document).ready(function() {
		$('#indexEditPictureModal').on('shown.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('value')
			
			// var txt = button.text()
			// modal.find('#readSendFrom').val(txt)

			var pat = $('#path'+id).val()
			var sub = $('#subtitle'+id).val()
			var des = $('#description'+id).val()
			var sta = $('#status'+id).val()
			var tar = $('#target_dir'+id).val()

			var modal = $(this)
			// modal.find('.modal-title').text('New message to ' + recipient)
			modal.find('#indexId').val(id)
			modal.find('#indexImage').attr('src', pat)
			modal.find('#indexPhotoSubtitle').val(sub)
			modal.find('#indexDescription').text(des)
			modal.find('#indexTarget_dir').val(tar)

			if (sta == '1') {
				modal.find('#mActivate').attr('disabled', 'disabled')
			} else {
				modal.find('#mDesactivate').attr('disabled', 'disabled')
			}

		})
	});

</script>