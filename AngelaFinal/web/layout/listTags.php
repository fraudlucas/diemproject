 <?php
require_once (DIR_VIE.'tagsView.php');
$tagsView = new TagsView();
$list = $tagsView->listAll();
$code ='';
foreach ($list as $row) {
	$id = $row->getId();
	$name = $row->getName();			
	$code .='<option value="'.$id.'">'.$name.'</option>';
	 
}
echo $code;
?>

                               