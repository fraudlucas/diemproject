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

	public function searchTag($tagID) {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("SELECT * FROM tags WHERE id = :id");
		$stmt->bindParam(':id', $tagID);
		$stmt->execute();
		$result = $stmt->fetch();

		$tag = new Tags();
		$tag->setId($result['id']);
		$tag->setName($result['name']);
			

		return $tag;
	}


	public function remove($tagID) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("DELETE FROM tags WHERE id = :id");
		
		$stmt->bindParam(':id', $tagID);
		
		
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}
}

?>