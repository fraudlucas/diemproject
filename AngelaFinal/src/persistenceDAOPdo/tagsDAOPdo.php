<?php 
	require_once DIR_PER.'tagsDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'tags.php';

class TagsDAOPdo implements TagsDAO {

	public function add($tags) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO tags(name) values (:name)");
		
		$stmt->bindParam(':name', $tags->getName());
		
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}

	public function listAll() {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM tags");
		$stmt->execute();
		$result = $stmt->fetchAll();

		$tagsList = new ArrayObject();

		foreach ($result as $row) {
			$tags = new Tags();
			$tags->setId($row['id']);
			$tags->setName($row['name']);
			$tagsList->append($tags);
		}

		return $tagsList;
	}   
}

?>