<?php

class Wardrobe{
	private $id;
	private $userId;
	private $clothesId;
	private $dates;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getUserId(){
		return $this->userId;
	}
	
	public function setUserId($userId){
		$this->userId = $userId;
	}
	
	public function getClothesId(){
		return $this->clothesId;
	}
	
	public function setClothesId($clothesId){
		$this->clothesId = $clothesId;
	}
	
	public function getDates(){
		return $this->dates;
	}
	
	public function setDates($dates){
		$this->dates = $dates;
	}
	
	
}

?>