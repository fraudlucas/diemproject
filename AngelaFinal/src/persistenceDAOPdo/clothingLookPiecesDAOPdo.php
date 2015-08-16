<?php 
	require_once DIR_PER.'clothingLookPiecesDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'clothingLookPieces.php';

class clothingLooksDAOPdo implements clothingLookPiecesDAO {

	public function add($clothingLookPieces) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO looks (clothing1id, clothing2id,userId) values (:clothing1id, :clothing2id,:userId)");
		
		$stmt->bindParam(':clothing1id', $clothingLookPieces->getClothing1Id());
		$stmt->bindParam(':clothing2id', $clothingLookPieces->getClothing2Id());
		$stmt->bindParam(':userId', $clothingLookPieces->getUserId());
		
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}

	public function listAll() {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM looks");
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
	
	public function search($param,$value,$type) {
			$className = 'ConnectionDAOPdo';
			$con = $className::getConnection();
			$query = 'SELECT * FROM looks Where '.$param.' = "'.$value.'"';
			$stmt = $con->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll();

			$lookslist = new ArrayObject();

			$looks = '';

			foreach ($result as $row) {				
				$looks = new clothingLookPieces();
				$looks->setId($row['id']);
				$looks->setClothing1Id($row['clothing1id']);
				$looks->setClothing2Id($row['clothing2id']);
				$looks->setUserId($row['userId']);
				$lookslist->append($looks);
			}
			
			if($type==1){
				return $looks;
			}elseif($type==2){
				return $lookslist;
			}
		} 
}

?>