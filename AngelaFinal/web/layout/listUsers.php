 <?php
	require_once (DIR_VIE.'userView.php');
	$userView = new UserView();
	$list = $userView->searchUsers('administratorID',$users_type,'2');
	$code ='';
	$code2 = '';
	$activate = '';
	$activate_action = '';

	foreach ($list as $row) {
		$status = $row->getStatus();
		if ($status != '2' && !$flag_button) continue;
		$id = $row->getIdUser();
		$fname = $row->getFirstName();
		$lname = $row->getLastName();
		$email = $row->getEmail();
		$id = $row->getIdUser();
		$code2 = '<td>&nbsp;</td>';
		$date = date("Y/m/d", strtotime($row->getTimeCreated()));
		if ($status == 3 && $flag_button){
			$code2 = '<td class="text-center">
			
				<span class="label label-default">Pending</span>
			</td>';

			$activate = '<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
				';

			$activate_action = '';
		}
		
		if ($status == 2 && $flag_button){
			$code2 = '<td class="text-center">
			
				 <span class="label label-success">Active</span>
			</td>';
			$activate = '<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
				';
			
			$activate_action = '';
		}
		
		if ($status == 1 && $flag_button){
			$code2 = '<td class="text-center">		
				<span class="label label-danger">Inactive</span>
			</td>';

			$activate = '<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-check-square fa-stack-1x fa-inverse"></i>
				';

			$activate_action = 'un';
		}
		
		$code .='
		<tr>
			<td>
					<a href="#" title="Open Profile" data-toggle="modal" data-target="#modalUserView" data-value="'.$id.'" class="user-link">'.$fname.' '.$lname.'</a>
			</td>
			<td>'.$date.'</td>'
			.$code2.'
			<td>
				<a href="#" title="Open Profile" data-toggle="modal" data-target="#modalUserView" data-value="'.$id.'" class="user-link">'.$email.'</a>
			</td>
			<td style="width: 20%;">

				<a href="#" title="Message" data-toggle="modal" data-target="#sendMessageModal" data-value="'.$id.'">
					<span class="fa-stack">
						<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
					</span>
				</a>
				';
		$delete = '<a href="../../src/handlers/userHandler.php?a=user'.$activate_action.'delete&id='.urlencode($id).'&p='.$pageToReturn.'" title="Deactivate" class="table-link danger">
					<span class="fa-stack">
						'.$activate.
					'</span>
				</a>
			';
				
		$code = ($flag_button ? $code.$delete : $code);		
		
		$code = $code .'</td>
		</tr>';
		 unset($code2);
	}
	echo $code;

// 	<a href="../pages/adminUserView.php?a='.$id.'"  onclick="window.open(this.href, \'mywin\',
// \'left=20,top=20,width=500,height=600,toolbar=1,resizable=0\'); return false;" class="user-link">'.$fname.' '.$lname.'</a>


// <a href="#" data-toggle="modal" data-target="#modalUserView" data-value="'.$id.'" class="user-link">'.$fname.' '.$lname.'</a>
 ?>

                               