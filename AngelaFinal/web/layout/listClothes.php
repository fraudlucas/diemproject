 <?php
	require_once (DIR_VIE.'clothesView.php');
	require_once (DIR_VIE.'tagsView.php');
	require_once (DIR_MOD.'clothes.php');
	$clothes = new Clothes();
	$clothesView = new ClothesView();
	$list = $clothesView->listAll();
	$tagView = new TagsView();
	$code = '';

	foreach ($list as $row) {
		$id = $row->getId();
		$picture = $row->getPicture();	
		$tag = $tagView->searchTag($row->getTagId());
		$typeID = $row->getTypeId();
		$type = ($typeID == 1 ? 'Top' : ($typeID == 2 ? 'Bottom' : 'Dress'));
		$price = $row->getPrice();
		$customizedId = $row->getCustomized();
		$customized = ($customizedId == 2 ? 'No' : 'Yes');
		
				
		$code .='<div class="col-md-2">				
							<a href="#" class="thumbnail" data-toggle="modal" data-target="#showClothesModal" data-value="'.$id.'">
								<img class="img-responsive img-thumbnail" src="../../'.$picture.'" alt="Pulpit Rock" style="width:150px;height:150px">
							</a>

							<input type="hidden" id="tag'.$id.'" value="'.$tag->getName().'">
							<input type="hidden" id="tagId'.$id.'" value="'.$tag->getId().'">
							<input type="hidden" id="typeId'.$id.'" value="'.$typeID.'">
							<input type="hidden" id="type'.$id.'" value="'.$type.'">
							<input type="hidden" id="price'.$id.'" value="'.$price.'">
							<input type="hidden" id="customizedId'.$id.'" value="'.$customizedId.'">
							<input type="hidden" id="customized'.$id.'" value="'.$customized.'">
							<input type="hidden" id="picture'.$id.'" value="'.$picture.'">
							<input type="hidden" id="code'.$id.'" value="'.$row->getCode().'">
						</div>	';
		 
	}

?>



<div id="listClothesContent">
	<?php echo $code; ?>	
</div>

<!-- Modal -->
<div id="showClothesModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Picture</h4>
			</div>
			<div class="modal-body">
				<form  role="form" action="../../src/handlers/clothesHandler.php?a=updateClothes&p=<?php echo $pageToReturn; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<center><img id="showclothesimage" class="img-responsive" src="" style="height:200px; weight:400px"></center>
						<label for="file">File</label>
						<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
					</div>
					<div class="form-group">
						<!-- <div class="col-xs-6 col-md-4"> -->
						<label for="showclothescode">Code:</label>
						<input type="text" class="form-control" id="showclothescode" name="code" required>
						<!-- </div>
						<div class="col-xs-6 col-md-4"> -->
						<label for="showclothesprice">Price:</label>
						<input type="text" class="form-control" id="showclothesprice" name="price" required>
						<!-- </div> -->
						<!-- <div class="col-xs-6 col-md-4"> -->
						<label for="showclothestag">Tag:</label>
						<select class="form-control" id="showclothestag" name="tag">
							<?php include( DIR_LAY.'listTags.php') ;?>
						</select>
						<!-- </div>
						<div class="col-xs-6 col-md-4"> -->
						<label for="showclothescustomized">Customized:</label>
						<select class="form-control" name="customized" id="showclothescustomized">
							<option value="1">Yes</option>
							<option value="2">No</option>
						</select>
						<!-- </div> -->
						<label for="showclothestype">Type:</label>
						<select class="form-control" name="type" id="showclothestype">
							<option value="1">Top</option>
							<option value="2">Bottom</option>
							<option value="3">Dress</option>
						</select>
					</div>
					<input type="hidden" name="target_dir" id="showclothesTarget_dir" class="form-control" value="">
					<input type="hidden" name="id" id="showclothesId" class="form-control" value="">
					<button class="btn btn-info " name="submit" type="submit">Update</button>
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
		$('#showClothesModal').on('shown.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('value')
			
			// var txt = button.text()
			// modal.find('#readSendFrom').val(txt)

			var cod = $('#code'+id).val()
			var pri = $('#price'+id).val()
			var tag = $('#tagId'+id).val()
			var cus = $('#customizedId'+id).val()
			var typ = $('#typeId'+id).val()
			var pat = $('#picture'+id).val()

			var modal = $(this)
			// modal.find('.modal-title').text('New message to ' + recipient)
			// modal.find('#testimonialsId').val(id)
			modal.find('#showclothesimage').attr('src', "../../"+pat)
			modal.find('#showclothescode').val(cod)
			modal.find('#showclothesprice').val(pri)
			modal.find('#showclothestag').val(tag)
			modal.find('#showclothescustomized').val(cus)
			modal.find('#showclothestype').val(typ)
			modal.find('#showclothesTarget_dir').val(pat)
			modal.find('#showclothesId').val(id)

		})

		$('#filter').change(function(event) {
			/* Act on the event */
			var value = $('#filter').val()
			var content = $('#listClothesContent')

			$.get('../layout/clothesContentFilterTag.php', {w: '1', f: value}, function(data) {
				/*optional stuff to do after success */
				content.html(data)
			})
		})

	});

</script>