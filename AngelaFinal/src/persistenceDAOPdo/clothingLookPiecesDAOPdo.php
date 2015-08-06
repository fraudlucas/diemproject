<?php 
	require_once DIR_PER.'clothingLookPiecesDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'clothingLookPieces.php';

class clothingLooksDAOPdo implements clothesLookPiecesDAO {

	public function add($clothingLookPieces) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO clothinglookpieces (clothingLookID, clothingID) values (:clothingLookID, :clothingID)");
		
		$stmt->bindParam(':clothingLookID', $clothinglooks->getClothingLookID());
		$stmt->bindParam(':clothingID', $clothinglooks->getClothingID());
		
		
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}

	public function listAll() {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM clothinglookpieces");
		$stmt->execute();
		$result = $stmt->fetchAll();

		$tagsList = new ArrayObject();

		foreach ($result as $row) {
			$clothinglooks = new Clothingtype();
			$clothinglooks->setClothingLookID($row['clothingLookID']);
			$clothinglooks->setClothingID($row['clothingID']);
			
			$clothinglooksList->append($clothinglooks);
		}

		return $clothinglooksList;
	}   
}

?>