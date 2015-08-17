<?php 

interface ManagementContentDAO {
	public function addContent($management);
	public function updateContent($management);
	public function searchContent($param,$value,$type);
	public function updateColor($color);
	public function searchColor();
	public function updateLogo($logo);
	public function searchLogo();
	public function updateEmail($email, $emailID);
	public function searchEmail($emailID);
}

?>