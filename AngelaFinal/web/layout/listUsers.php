 <?php
	require_once (DIR_VIE.'userView.php');
	$userView = new UserView();
	$list = $userView->searchUsers('administratorID','2','2');
	$code ='';
	$code2 = '';
	foreach ($list as $row) {
		$id = $row->getIdUser();
		$fname = $row->getFirstName();
		$lname = $row->getLastName();
		$email = $row->getEmail();
		$status = $row->getStatus();
		$id = $row->getIdUser();
		if ($status == 3 ){
			$code2 = '<td class="text-center">
			
				<span class="label label-default">pending</span>
			</td>';
		}
		
		if ($status == 2){
			$code2 = '<td class="text-center">
			
				 <span class="label label-success">Active</span>
			</td>';
		}
		
		if ($status == 1){
			$code2 = '<td class="text-center">		
				<span class="label label-danger">inactive</span>
			</td>';
		}
		
		$code .='
		<tr>
			<td>
				<a href="../pages/adminUserView.php?a='.$id.'"  onclick="window.open(this.href, \'mywin\',
\'left=20,top=20,width=500,height=600,toolbar=1,resizable=0\'); return false;" class="user-link">'.$fname.' '.$lname.'</a>
			</td>
			<td>2013/08/12</td>'
			.$code2.'
			<td>
				<a href="#">'.$email.'</a>
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
		 unset($code2);
	}
	echo $code;
 ?>

                               