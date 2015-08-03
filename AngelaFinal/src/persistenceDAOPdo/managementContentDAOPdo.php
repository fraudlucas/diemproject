<?php 

	//require_once('../config.php');
	require_once DIR_PER.'managementContentDAO.php';
	require_once DIR_PDO.'connectionDAOPdo.php';
	require_once DIR_MOD.'managementContent.php';


class ManagementContentDAOPdo implements ManagementContentDAO {

	public function addContent($management) {

		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO pagecontent (pageId,variable, content)"
                        . " VALUES (:pageId, :variable, :content)");
		$stmt->bindParam(':pageId', $management->getPageIdContent());
                $stmt->bindParam(':variable', $management->getVariable());
            	$stmt->bindParam(':content',  $management->getContent());
               
		$teste = $stmt->execute();

		return 'Sucesso - ' . $teste;
	}
	
	public function updateContent($management) {
		$className = 'ConnectionDAOPdo';
			try {		
				$con = $className::getConnection();
				$stmt = $con->prepare("UPDATE pagecontent SET 
					content = :content 				
					WHERE pageID = :pageid");
				$stmt->bindParam(':content', $management->getContent());
				$stmt->bindParam(':pageid', $management->getPageIdContent());
				
				
				$stmt->execute();    // Execute the prepared query.
				
				return true;
			}
			catch(PDOException $e){
				echo $e;
				return false;
			}
	}
	
	
	public function searchContent($param,$value,$type){
		$className = 'ConnectionDAOPdo';
		
		$con = $className::getConnection();
		$query = 'SELECT * FROM pagecontent Where '.$param.' = '.$value;
		$stmt = $con->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$managementsList = new ArrayObject();

		foreach ($result as $row) {
			
			$management = new ManagementContent();

			$management->setIdContent($row['id']);
			$management->setPageIdContent($row['pageID']);
			$management->setVariable($row['variable']);
			$management->setContent($row['content']);
			
			
			$managementsList->append($management);
		}
		
		if($type==1){
			return $management;
		}elseif($type==2){
			return $managementsList;
		}
	}

	//acho que nao precisaria criar  outro PDO so pra mudar  a cor ==> como assim?

	public function selectColor(){
		
		$className = 'ConnectionDAOPdo';

		$con = $className::getConnection();
		$query = 'SELECT * FROM color Where idColor = 1';
		$stmt = $con->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result->setColor;

	}
	
	public function updateColor($color){
		$className = 'ConnectionDAOPdo';
			
		try {		
			$con = $className::getConnection();
			$stmt = $con->prepare("UPDATE colors SET 
				colors = :content 				
				WHERE idColor = 1");
			$stmt->bindParam(':content', $color->getColor());
		//nao sei nem oq  eu to fazendo aqui ==> to percebendo kkk
		
			$stmt->execute();    // Execute the prepared query.
				
			return true;
		}
		catch(PDOException $e){
			echo $e;
			return false;
		}
	}
}
?>