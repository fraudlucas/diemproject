<?php 
	require_once DIR_PER.'clothingLooksDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'clothingLooks.php';

class clothingLooksDAOPdo implements clothesTypeDAO {

	public function add($clothinglooks) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO clothinglooks (addingDate, userID) values (:addingDate, :userID)");
		
		$stmt->bindParam(':addingDate', $clothinglooks->getAddingDate());
		$stmt->bindParam(':userID', $clothinglooks->getUserID());
		
		
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}

	public function listAll() {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM clothinglooks");
		$stmt->execute();
		$result = $stmt->fetchAll();

		$tagsList = new ArrayObject();

		foreach ($result as $row) {
			$clothinglooks = new Clothingtype();
			$clothinglooks->setAddingDate($row['addingDate']);
			$clothinglooks->setUserID($row['userID']);
			$clothinglooks->setIdClothingLooks($row['id']);
			$clothinglooksList->append($clothinglooks);
		}

		return $clothinglooksList;
	}   
}

?>