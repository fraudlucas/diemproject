<?php 
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once DIR_MOD.'user.php';
	require_once DIR_VIE.'userView.php';
	$session = new Session();
	$userView = new UserView();

	$info = isset($_GET['i']) ? $_GET['i'] : '';
	$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';
	$flag_button = isset($_GET['f']) ? $_GET['f'] : '';
	$type = isset($_GET['t']) ? $_GET['t'] : '';


	$list = $userView->searching($info);
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
		$act = 'Dea';
		if ($row->getAdministratorID() != $type) continue;
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

			$act = 'A';

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
		$delete = '<a href="../../src/handlers/userHandler.php?a=user'.$activate_action.'delete&id='.urlencode($id).'&p='.$pageToReturn.'" title="'.$act.'ctivate" class="table-link danger">
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

?>