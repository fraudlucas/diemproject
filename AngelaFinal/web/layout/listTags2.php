 <?php
	require_once (DIR_VIE.'tagsView.php');
	$tagsView = new TagsView();
	$list = $tagsView->listAll();
	$code ='';
	foreach ($list as $row) {
		$id = $row->getId();
		$name = $row->getName();			
		$code .='
		<tr>

			<td>
				<a href="#">'.$name.'</a>
			</td>
			<td style="width: 20%;">
				
				<a href="handlers/userHandler.php?a=edit&id='.urlencode($id).'" class="table-link">
					<span class="fa-stack">
						<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
					</span>
				</a>
				<a href="handlers/userHandler.php?a=userdelete&id='.urlencode($id).'" class="table-link danger">
					<span class="fa-stack">
						<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</td>
		</tr>';
		 
	}
	echo $code;
 ?>