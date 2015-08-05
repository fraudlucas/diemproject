<?php 
	require_once DIR_PER.'clothingTypeDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'clothingType.php';

class TagsDAOPdo implements clothesTypeDAO {

	public function add($clothingtype) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO clothingtype (typeName) values (:name)");
		
		$stmt->bindParam(':name', $tags->getName());
		
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}

	public function listAll() {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM clothingtype");
		$stmt->execute();
		$result = $stmt->fetchAll();

		$tagsList = new ArrayObject();

		foreach ($result as $row) {
			$clothingtype = new Clothingtype();
			$clothingtype->setId($row['id']);
			$clothingtype->setName($row['typeName']);
			$clothingtypeList->append($tags);
		}

		return $clothingtypeList;
	}   
}

?>