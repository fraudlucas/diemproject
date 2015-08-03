<?php 
	require_once DIR_PER.'wardrobeDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'wardrobe.php';

class WardrobeDAOPdo implements WardrobeDAO {

	public function add($wardrobe) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO wardrobe(userId,clothesId,date) values (:userId,:clothesId,:date)");
		
		$stmt->bindParam(':userId', $wardrobe->getUserId());
		$stmt->bindParam(':clothesId', $wardrobe->getClothesId());
		$stmt->bindParam(':date', $wardrobe->getDates());
		
		
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
			$wardrobe = new Wardrobe();
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