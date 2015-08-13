<?php	
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'wardrobeView.php');
	require_once (DIR_VIE.'clothesView.php');
	require_once (DIR_VIE.'tagsView.php');
	require_once (DIR_MOD.'clothes.php');
	$clothes = new Clothes();
	$clothesView = new ClothesView();
	$wardrobeView = new WardrobeView();
	$wardrobeList = $wardrobeView->searchWardrobe('userId',$_SESSION['userID'], '2'); 
	$tagView = new TagsView();
	$code = '';
	$count = 0;
	
	foreach ($wardrobeList as $row) {
		$id = $row->getId();
		$userId = $row->getUserId();
		$clothesId = $row->getClothesId();	
		$dates = $row->getDates();
		$clothes = $clothesView->searchClothes('id',$clothesId, '1');
		$tag = $tagView->searchTag($clothes->getTagId());
		$typeID = $clothes->getTypeId();
		$type = ($typeID == 1 ? 'Top' : ($typeID == 2 ? 'Bottom' : 'Dress'));
		$price = $clothes->getPrice();
		$customizedId = $clothes->getCustomized();
		$customized = ($customizedId == 2 ? 'No' : 'Yes');

		
		$code .='<div class="col-lg-3 col-md-4 col-xs-6 thumb">
						<a class="thumbnail" href="#" data-toggle="modal" data-target="#showClothesModal" data-value="'.$clothesId.'">
							<img class="img-responsive" src="../../'.$clothes->getPicture().'" alt="" style="height:200px; weight:400px" >
						</a>
						<input type="hidden" id="tag'.$clothesId.'" value="'.$tag->getName().'">
						<input type="hidden" id="tagId'.$clothesId.'" value="'.$tag->getId().'">
						<input type="hidden" id="typeId'.$clothesId.'" value="'.$typeID.'">
						<input type="hidden" id="type'.$clothesId.'" value="'.$type.'">
						<input type="hidden" id="price'.$clothesId.'" value="'.$price.'">
						<input type="hidden" id="customizedId'.$clothesId.'" value="'.$customizedId.'">
						<input type="hidden" id="customized'.$clothesId.'" value="'.$customized.'">
						<input type="hidden" id="picture'.$clothesId.'" value="../../'.$clothes->getPicture().'">
						<input type="hidden" id="code'.$clothesId.'" value="'.$clothes->getCode().'">

					</div>';
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
				<form  role="form" action="../../src/handlers/managementPhotosHandler.php?a=updatePhoto&p=<?php echo $pageToReturn; ?>&param=t&t=3" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<center><img id="showclothesimage" class="img-responsive" src="" style="height:300px; weight:500px"></center>
					</div>
					<div class="form-group">
						<!-- <div class="col-xs-6 col-md-4"> -->
						<label for="showclothescode">Code:</label>
						<input type="text" class="form-control" id="showclothescode" name="code" disabled="">
						<!-- </div>
						<div class="col-xs-6 col-md-4"> -->
						<label for="showclothesprice">Price:</label>
						<input type="text" class="form-control" id="showclothesprice" name="price" disabled="">
						<!-- </div> -->
						<!-- <div class="col-xs-6 col-md-4"> -->
						<label for="showclothestag">Tag:</label>
						<input type="text" class="form-control" id="showclothestag" name="tag" disabled="">
						<!-- </div>
						<div class="col-xs-6 col-md-4"> -->
						<label for="showclothescustomized">Customized:</label>
						<input type="text" class="form-control" id="showclothescustomized" name="customized" disabled="">
						<!-- </div> -->
						<label for="showclothestype">Type:</label>
						<input type="text" class="form-control" id="showclothestype" name="type" disabled="">
					</div>
					<!-- <input type="hidden" name="target_dir" id="testimonialsTarget_dir" class="form-control" value="">
					<input type="hidden" name="id" id="testimonialsId" class="form-control" value="">
					<button class="btn btn-info" name="submit" type="submit">Update</button> -->
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
			var tag = $('#tag'+id).val()
			var cus = $('#customized'+id).val()
			var typ = $('#type'+id).val()
			var pat = $('#picture'+id).val()

			var modal = $(this)
			// modal.find('.modal-title').text('New message to ' + recipient)
			// modal.find('#testimonialsId').val(id)
			modal.find('#showclothesimage').attr('src', pat)
			modal.find('#showclothescode').val(cod)
			modal.find('#showclothesprice').val(pri)
			modal.find('#showclothestag').val(tag)
			modal.find('#showclothescustomized').val(cus)
			modal.find('#showclothestype').val(typ)

			if (sta == '1') {
				modal.find('#mActivate').attr('disabled', 'disabled')
			} else {
				modal.find('#mDesactivate').attr('disabled', 'disabled')
			}

		})
	
		$('#filter').change(function(event) {
			/* Act on the event */
			var value = $('#filter').val()
			var content = $('#listClothesContent')

			$.get('../layout/clothesContentFilterTag.php', {w: '2', f: value}, function(data) {
				/*optional stuff to do after success */
				content.html(data)
			})
		})
	});

</script>