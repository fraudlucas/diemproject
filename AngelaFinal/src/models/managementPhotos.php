<?php

class ManagementPhotos{
	//Photo Management
	private $idPhoto;
	private $pathPhoto;
	private $pageIdPhoto;
	private $dates;
	private $active;
	private $subtitle;
	
		
	function getIdPhoto(){
		return $this->idPhoto;
	}
	
	function getPathPhoto(){
		return $this->pathPhoto;
	}
	
	function getPageIdPhoto(){
		return $this->pageIdPhoto;
	}
	
	function getDates(){
		return $this->dates;
	}
	
	function getActive(){
		return $this->active;
	}
	
	function getSubtitle(){
		return $this->subtitle;
	}
	
	function setIdPhoto($idPhoto){
		$this->idPhoto=$idPhoto;
	}
	
	function setPathPhoto($pathPhoto){
		$this->pathPhoto=$pathPhoto;
	}
	
	function setPageIdPhoto($pageIdPhoto){
		$this->pageIdPhoto=$pageIdPhoto;
	}
	
	function setDates($dates){
		$this->dates=$dates;
	}
	
	function setActive($active){
		$this->active=$active;
	}
	
	function setSubtitle($subtitle){
		$this->subtitle=$subtitle;
	}
		
}

?>
