<?php 

interface TagsDAO {
	public function add($tags);
	public function listAll();
	public function searchTag($tagID);
	public function remove($tagID);
}

?>