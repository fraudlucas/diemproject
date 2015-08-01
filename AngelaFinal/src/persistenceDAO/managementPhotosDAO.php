<?php 

interface ManagementPhotosDAO {
	public function addPhotos($management);
	public function updatePhotos($management);
	public function deletePhotos($id);
	public function desactivePhotos($id);
	public function activePhotos($id);
	public function searchPhotos($param,$value,$type);
}

?>