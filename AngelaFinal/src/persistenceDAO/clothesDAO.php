<?php 

interface ClothesDAO {
	public function add($clothes);
	public function listAll();
	public function searchClothes($param,$value,$type);
	public function updateClothes($clothes);
}

?>