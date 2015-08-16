<?php

class clothingLookPieces{

	private $id;
	private $clothing1Id;
	private $clothing2Id;
	private $userId;
	
	public function getId()
	{
	    return $this->id;
	}
	
	public function setId($id)
	{
	     $this->id = $id;
	}

	public function getClothing1Id()
	{
	    return $this->clothing1Id;
	}

	public function setClothing1Id($clothing1Id)
	{
	     $this->clothing1Id = $clothing1Id;
	}
	
	public function getClothing2Id()
	{
	    return $this->clothing2Id;
	}

	public function setClothing2Id($clothing2Id)
	{
	     $this->clothing2Id = $clothing2Id;
	}

	public function getUserId()
	{
	    return $this->userId;
	}

	public function setUserId($userId)
	{
	     $this->userId = $userId;
	}


}



?>