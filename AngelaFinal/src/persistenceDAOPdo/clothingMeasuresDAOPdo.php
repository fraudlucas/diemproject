<?php 
	require_once DIR_PER.'clothingMeasureDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'clothingMeasure.php';

class clothingLooksDAOPdo implements ClothesMeasureDAO {

	public function add($clothingMeasure) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO clothingmeasures (size) values (:size)");
		

		$stmt->bindParam(':size', $clothinglooks->getSizeCloaths();
		
		
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}

	public function listAll() {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM clothingmeasures");
		$stmt->execute();
		$result = $stmt->fetchAll();

		$tagsList = new ArrayObject();

		foreach ($result as $row) {
			$clothinglooks = new Clothingtype();
			$clothinglooks->setSizeCloaths($row['size']);
			$clothinglooks->setIdCloathingMeasuresD($row['id']);
			
			$clothingMeasureList->append($clothinglooks);
		}

		return $clothingMeasureList;
	}   
}

?>