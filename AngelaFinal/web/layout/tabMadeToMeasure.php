<?php	
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	require_once (DIR_VIE.'managementContentView.php');
	$mdtomeasureManagementPhotosView = new ManagementPhotosView();
	$mdtomeasureManagementContentView = new ManagementContentView();
	$mdtomeasurePhotosList = $mdtomeasureManagementPhotosView->searchPhotos('pageId','4','2');
	$mdtomeasureManagementContent = $mdtomeasureManagementContentView->searchContent('pageId','4','1');
	$mdtomeasurehowManagementContent = $mdtomeasureManagementContentView->searchContent('pageId','8','1');
	$code = '';
	$count = 0;
	$madeToMeasureAction = 'addPhoto';
	$target_dir = 'web/assets/img/madeToMeasure/';

	
	foreach ($mdtomeasurePhotosList as $row) {
		if (!empty($row)) {
			$madeToMeasureAction = 'updatePhoto';
		}
		$path = $row->getPathPhoto();
		$id = $row->getIdPhoto();
		$subtitle = $row->getSubtitle();	
		$status = $row->getActive();
		
		if($status == 1){
			$code .='<div class="col-md-4">
						<input type="radio"  id="'.$id.'" name="'.$id.'" style="margin-left: 70px;" value="Yes">
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px"></label>
						</a>
					</div>';
		}elseif($status==0){
			$code .='<div class="col-md-4">
						<input type="radio"  id="'.$id.'" name="'.$id.'" style="margin-left: 70px;" value="Yes">
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px"></label>
						</a>
					</div>';
		}
		
	}
?>
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<div class="row">
	<div class="panel panel-default" >
		<div class="panel-heading">Manage Page Photos
			<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
		</div>
		<div class="panel-body">
			<div class="col-xs-9 col-md-6">
				<div class="main-box no-header clearfix">
					<div class="main-box-body clearfix">
						<div class="table-responsive">
							<form  role="form" action="../../src/handlers/managementPhotosHandler.php?a=<?php echo $madeToMeasureAction; ?>&b=4&p=<?php echo $pageToReturn; ?>&param=t&t=2" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="file">File</label>
									<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
								</div>
								<div class="form-group">
									<label for="text">Subtitle</label>
									<input type="text" name="photoSubtitle" id="photoSubtitle" class="form-control" placeholder="Subtitle" maxlength="80">
								</div>
								<input type="hidden" name="target_dir" id="target_dir" class="form-control" value="web/assets/img/madeToMeasure/">
								<button class="btn btn-info" name="submit" type="submit">Upload Image</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-9 col-md-6" style="height:100% overflow-y:auto">
				<div class="row">
					<form role="form" method="post">
						
						<?php echo $code;?>
					
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default" style="margin-bottom:0px">
		<div class="panel-heading">
			Manage Page Content (Made To Measure)
			<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
		</div>
		<div class="panel-body">
			<div class="container" style="width:100%">
			  	<div class="hero-unit" >
					<!--
					Please read this before copying the toolbar:

					* One of the best things about this widget is that it does not impose any styling on you, and that it allows you 
					* to create a custom toolbar with the options and functions that are good for your particular use. This toolbar
					* is just an example - don't just copy it and force yourself to use the demo styling. Create your own. Read 
					* this page to understand how to customise it:
					* https://github.com/mindmup/bootstrap-wysiwyg/blob/master/README.md#customising-
					-->
					<div id="alerts"></div>
					<form action="../../src/handlers/managementContentHandler.php?a=updateContent&b=4&p=<?php echo $pageToReturn; ?>&param=t&t=5" method="post">
						<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
						  <div class="btn-group" >
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font" ></i><b class="caret" ></b></a>
							  <ul class="dropdown-menu">
							  </ul>
						  </div>
						  <div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
							  <ul class="dropdown-menu">
							  <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
							  <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
							  <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
							  </ul>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
							<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
							<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
							<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
							<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
							<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
							<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
							<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
							<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
							<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
						  </div>
						  <div class="btn-group">
							  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
								<div class="dropdown-menu input-append">
									<input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
									<button class="btn" type="button">Add</button>
							</div>
							<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

						  </div>
						  
						  <!-- <div class="btn-group">
							<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
							<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
						  </div> -->
						  <div class="btn-group">
							<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
							<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
						  </div>
						  <input type="text"  data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
						  <input type="hidden" name="content" id="mdtomeasure_dash_new_shout_textarea_hidden" />
							<script type="text/javascript">
							setInterval(function () {
							  document.getElementById("mdtomeasure_dash_new_shout_textarea_hidden").value = document.getElementById("mdtomeasureflag").nextElementSibling.innerHTML;
							}, 5);
							</script>
						  <button type="submit" class="btn">Save</button>
						</div>
					</form>

					<div id="mdtomeasureflag"></div>
					<div id="editor" contenteditable="true"><?php echo $mdtomeasureManagementContent->getContent();?></div>
				</div>
		  	</div>
		  
		</div>
	</div>
	<div class="panel panel-default" style="margin-bottom:0px">
		<div class="panel-heading">
			Manage Page Content (How It Works)
			<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
		</div>
		<div class="panel-body">
			<div class="container" style="width:100%">
			  	<div class="hero-unit" >
					<!--
					Please read this before copying the toolbar:

					* One of the best things about this widget is that it does not impose any styling on you, and that it allows you 
					* to create a custom toolbar with the options and functions that are good for your particular use. This toolbar
					* is just an example - don't just copy it and force yourself to use the demo styling. Create your own. Read 
					* this page to understand how to customise it:
					* https://github.com/mindmup/bootstrap-wysiwyg/blob/master/README.md#customising-
					-->
					<div id="alerts"></div>
					<form action="../../src/handlers/managementContentHandler.php?a=updateContent&b=8&p=<?php echo $pageToReturn; ?>&param=t&t=5" method="post">
						<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
						  <div class="btn-group" >
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font" ></i><b class="caret" ></b></a>
							  <ul class="dropdown-menu">
							  </ul>
						  </div>
						  <div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
							  <ul class="dropdown-menu">
							  <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
							  <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
							  <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
							  </ul>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
							<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
							<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
							<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
							<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
							<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
							<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
							<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
							<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
							<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
						  </div>
						  <div class="btn-group">
							  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
								<div class="dropdown-menu input-append">
									<input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
									<button class="btn" type="button">Add</button>
							</div>
							<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

						  </div>
						  
						  <!-- <div class="btn-group">
							<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
							<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
						  </div> -->
						  <div class="btn-group">
							<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
							<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
						  </div>
						  <input type="text"  data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
						  <input type="hidden" name="content" id="mdtomeasurehow_dash_new_shout_textarea_hidden" />
							<script type="text/javascript">
							setInterval(function () {
							  document.getElementById("mdtomeasurehow_dash_new_shout_textarea_hidden").value = document.getElementById("mdtomeasurehowflag").nextElementSibling.innerHTML;
							}, 5);
							</script>
						  <button type="submit" class="btn">Save</button>
						</div>
					</form>

					<div id="mdtomeasurehowflag"></div>
					<div id="editor" contenteditable="true"><?php echo $mdtomeasurehowManagementContent->getContent();?></div>
				</div>
		  	</div>
		  
		</div>
	</div>
</div>


<!-- Modal -->
<div id="madeToMeasureEditPictureModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Picture</h4>
			</div>
			<div class="modal-body">
				<form  role="form" action="../../src/handlers/managementPhotosHandler.php?a=updatePhoto&p=<?php echo $pageToReturn; ?>&param=t&t=5" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" name="fileToUpload" id="madeToMeasureFileToUpload" class="form-control">
						<img id="madeToMeasureImage" class="img-responsive" src="" style="width:150px;height:150px">
					</div>
					<div class="form-group">
						<label for="text">Subtitle</label>
						<input type="text" name="photoSubtitle" id="madeToMeasurePhotoSubtitle" class="form-control" placeholder="Subtitle" maxlength="80">
						<label for="description">Description</label>
						<textarea class="form-control" id="madeToMeasureDescription" name="description" placeholder="Type the description here" rows="3" maxlength="200"></textarea>
					</div>
					<input type="hidden" name="target_dir" id="madeToMeasureTarget_dir" class="form-control" value="">
					<input type="hidden" name="id" id="madeToMeasureId" class="form-control" value="">
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
		$('#madeToMeasureEditPictureModal').on('shown.bs.modal', function (event) {
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
			modal.find('#madeToMeasureId').val(id)
			modal.find('#madeToMeasureImage').attr('src', pat)
			modal.find('#madeToMeasurePhotoSubtitle').val(sub)
			modal.find('#madeToMeasureDescription').text(des)
			modal.find('#madeToMeasureTarget_dir').val(tar)

			if (sta == '1') {
				modal.find('#mActivate').attr('disabled', 'disabled')
			} else {
				modal.find('#mDesactivate').attr('disabled', 'disabled')
			}

		})
	});

</script>