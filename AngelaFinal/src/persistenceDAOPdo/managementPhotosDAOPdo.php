<?php 

	//require_once('../config.php');
	require_once DIR_PER.'managementPhotosDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'managementPhotos.php';


class ManagementPhotosDAOPdo implements ManagementPhotosDAO {
	
	public function addPhotos($management) {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO pagephotos (path, pageId,subtitle,description,active)"
                        . " VALUES (:path,:pageId, :subtitle, :description, 1)");
		$stmt->bindParam(':path', $management->getPathPhoto());
                $stmt->bindParam(':pageId', $management->getPageIdPhoto());
            	$stmt->bindParam(':subtitle',  $management->getSubtitle());
            	$stmt->bindParam(':description',  $management->getDescription());
               
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}
	
	public function deletePhotos($id) {
		$className = 'ConnectionDAOPdo';
		try {
			$con = $className::getConnection();
			$query = 'DELETE FROM pagephotos Where id = '.$id;
			$stmt = $con->prepare($query);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}
	
	public function desactivePhotos($id) {
		$className = 'ConnectionDAOPdo';		
		try {
			$con = $className::getConnection();
			$stmt = $con->prepare("UPDATE pagephotos SET active = 0 WHERE id = :id");
			$stmt->bindParam(':id', $id);   // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}
	
	public function activePhotos($id) {
		$className = 'ConnectionDAOPdo';		
		try {
			$con = $className::getConnection();
			$stmt = $con->prepare("UPDATE pagephotos SET active = 1 WHERE id = :id");
			$stmt->bindParam(':id', $id);   // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}
	
	public function updatePhotos($management) {
		$className = 'ConnectionDAOPdo';		
		try {
			$con = $className::getConnection();
			$stmt = $con->prepare("UPDATE pagephotos SET path = :path WHERE pageId = :pageid");
			$stmt->bindParam(':path', $management->getPathPhoto()); 
			$stmt->bindParam(':pageid', $management->getPageIdPhoto());   // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public function searchPhotos($param,$value,$type) {
		$className = 'ConnectionDAOPdo';
		
		$con = $className::getConnection();
		$query = 'SELECT * FROM pagephotos Where '.$param.' = '.$value;
		$stmt = $con->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$managementsList = new ArrayObject();

		foreach ($result as $row) {
			
			$management = new ManagementPhotos();

			$management->setIdPhoto($row['id']);
			$management->setPathPhoto($row['path']);
			$management->setPageIdPhoto($row['pageId']);
			$management->setDates($row['date']);
			$management->setActive($row['active']);
			$management->setSubtitle($row['subtitle']);
			$management->setDescription($row['description']);
			
			$managementsList->append($management);
		}
		
		if($type==1){
			return $management;
		}elseif($type==2){
			return $managementsList;
		}

	} 
	
	

}

?>