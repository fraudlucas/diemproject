<?php

class ManagementContent{
//Content Management
	private $idContent;
	private $pageIdContent;
	private $variable;
	private $content;
	
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
}
