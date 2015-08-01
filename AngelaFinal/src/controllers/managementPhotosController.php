<?php 
	//require_once('../config.php');
	
	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'managementPhotosDAO.php';

class ManagementPhotosController {

	private $factory;
	private $persistenceManagement;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceManagement = $this->factory->createManagementPhotosPersistence();
	}
	

	public function addPhotos($management){
		$result = $this->persistenceManagement->addPhotos($management);
		return $result;
	}
	
	public function updatePhotos($management){
		$result = $this->persistenceManagement->updatePhotos($management);
		return $result;
	}
	
	public function searchPhotos($param,$value,$type){
		$result = $this->persistenceManagement->searchPhotos($param,$value,$type);
		return $result;
	}
	
	public function deletePhotos($id){
		$result = $this->persistenceManagement->deletePhotos($id);
		return $result;
	}
	
	public function desactivePhotos($id){
		$result = $this->persistenceManagement->desactivePhotos($id);
		return $result;
	}
	
	public function activePhotos($id){
		$result = $this->persistenceManagement->activePhotos($id);
		return $result;
	}
	
	function resize($file){
		$source_pic = $file;
		$max_width = 200;
		$max_height = 200;

		list($width, $height, $image_type) = getimagesize($file);

		switch ($image_type)
		{
			case 1: $src = imagecreatefromgif($file); break;
			case 2: $src = imagecreatefromjpeg($file);  break;
			case 3: $src = imagecreatefrompng($file); break;
			default: return '';  break;
		}

		$x_ratio = $max_width / $width;
		$y_ratio = $max_height / $height;

		if( ($width <= $max_width) && ($height <= $max_height) ){
			$tn_width = $width;
			$tn_height = $height;
			}elseif (($x_ratio * $height) < $max_height){
				$tn_height = ceil($x_ratio * $height);
				$tn_width = $max_width;
			}else{
				$tn_width = ceil($y_ratio * $width);
				$tn_height = $max_height;
		}

		$tmp = imagecreatetruecolor($tn_width,$tn_height);

		/* Check if this image is PNG or GIF, then set if Transparent*/
		if(($image_type == 1) OR ($image_type==3))
		{
			imagealphablending($tmp, false);
			imagesavealpha($tmp,true);
			$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
			imagefilledrectangle($tmp, 0, 0, $tn_width, $tn_height, $transparent);
		}
		imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

		/*
		 * imageXXX() only has two options, save as a file, or send to the browser.
		 * It does not provide you the oppurtunity to manipulate the final GIF/JPG/PNG file stream
		 * So I start the output buffering, use imageXXX() to output the data stream to the browser, 
		 * get the contents of the stream, and use clean to silently discard the buffered contents.
		 */
		ob_start();

		switch ($image_type)
		{
			case 1: imagegif($tmp); break;
			case 2: imagejpeg($tmp, NULL, 100);  break; // best quality
			case 3: imagepng($tmp, NULL, 0); break; // no compression
			default: echo ''; break;
		}

		$final_image = ob_get_contents();

		ob_end_clean();

		return $final_image;
	}
}

 ?>