<?php

class clothingType{
	
	private $idType;
	private $type;
	
	
	public function getIdType(){
		return $this->idType;
	}
	
	public function setIdType($idType){
		$this->idType = $idType;
	}
	
	public function getType(){
		return $this->type;
	}
	
	public function setType($type){
		$this->type = $type;
	}
	
}

?>