<?php

class Clothes{
	private $id;
	private $code;
	private $picture;
	private $price;
	private $customized;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getCode(){
		return $this->code;
	}
	
	public function setCode($code){
		$this->code = $code;
	}
	
	public function getPicture(){
		return $this->picture;
	}
	
	public function setPicture($picture){
		$this->picture = $picture;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function setPrice($price){
		$this->price = $price;
	}	
	
	public function getCustomized(){
		return $this->customized;
	}
	
	public function setCustomized($customized){
		$this->customized = $customized;
	}	
}

?>