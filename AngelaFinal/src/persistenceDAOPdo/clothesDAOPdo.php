<?php 
	require_once DIR_PER.'clothesDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'clothes.php';

class ClothesDAOPdo implements ClothesDAO {

	public function add($clothes) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO clothing(code,picture,price,customized) values (:code,:picture,:price,:customized)");
		
		$stmt->bindParam(':code', $clothes->getCode());
		$stmt->bindParam(':picture', $clothes->getPicture());
		$stmt->bindParam(':price', $clothes->getPrice());
		$stmt->bindParam(':customized', $clothes->getCustomized());
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}

	public function listAll() {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM clothing");
		$stmt->execute();
		$result = $stmt->fetchAll();

		$clothesList = new ArrayObject();

		foreach ($result as $row) {
			$clothes = new Clothes();
			$clothes->setId($row['id']);
			$clothes->setCode($row['code']);
			$clothes->setPicture($row['picture']);
			$clothes->setPrice($row['price']);
			$clothes->setCustomized($row['customized']);

			$clothesList->append($clothes);
		}

		return $clothesList;
	}   
}

?>