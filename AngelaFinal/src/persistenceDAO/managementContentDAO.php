<?php 

interface ManagementContentDAO {
	public function addContent($management);
	public function updateContent($management);
	public function searchContent($param,$value,$type);
	public function updateColor($color);
	public function selectColor();
}

?>