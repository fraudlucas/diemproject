<?php 

/**
* 
*/
class Message
{
	
	private $id;
	private $fromUser;
	private $toUser;
	private $topic;
	private $content;
	private $messageDate;
	private $read;

	public function getId() {
	     return $this->id;
	 }
	 
	 public function setId($id) {
	     $this->id = $id;
	 } 

	 public function getFromUser() {
	     return $this->fromUser;
	 }
	 
	 public function setFromUser($fromUser) {
	     $this->fromUser = $fromUser;
	 }

	 public function getToUser() {
	     return $this->toUser;
	 }
	 
	 public function setToUser($toUser) {
	     $this->toUser = $toUser;
	 }

	 public function getTopic() {
	     return $this->topic;
	 }
	 
	 public function setTopic($topic) {
	     $this->topic = $topic;
	 }

	 public function getContent() {
	     return $this->content;
	 }
	 
	 public function setContent($content) {
	     $this->content = $content;
	 }

	 public function getMessageDate() {
	     return $this->messageDate;
	 }
	 
	 public function setMessageDate($messageDate) {
	     $this->messageDate = $messageDate;
	 }

	 public function getRead() {
	     return $this->read;
	 }
	 
	 public function setRead($read) {
	     $this->read = $read;
	 }
}

 ?>