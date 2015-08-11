<?php

class ManagementContent{
//Content Management
	private $idContent;
	private $pageIdContent;
	private $variable;
	private $content;
	private $color;
	private $colorId;
	private $logo;
	private $logoId;
	
	function getIdContent(){
		return $this->idContent;
	}
	
	function setIdContent($idContent){
		$this->idContent=$idContent;
	}
	
	function getPageIdContent(){
		return $this->pageIdContent;
	}
	
	function setPageIdContent($pageIdContent){
		$this->pageIdContent=$pageIdContent;
	}
	
	function getVariable(){
		return $this->variable;
	}
	
	function setVariable($variable){
		$this->variable=$variable;
	}
	
	function getContent(){
		return $this->content;
	}
	
	function setContent($content){
		$this->content=$content;
	}
	
	function getColor(){
		return $this->color;
	}
	
	function setColor($color){
		$this->color=$color;
	}
	
	function getIdColor(){
		return $this->colorId;
	}
	
	function setIdColor($colorId){
		$this->colorId=$colorId;
	}

	function getLogo(){
		return $this->logo;
	}
	
	function setLogo($logo){
		$this->logo=$logo;
	}

	function getIdLogo(){
		return $this->logoId;
	}
	
	function setIdLogo($logoId){
		$this->logoId=$logoId;
	}

}
