<?php

class User{
	
    private $idUser;
    private $firstName;
    private $lastName;
    private $userName;
    private $password;
	private $salt;
    private $email;
    private $address;
    private $city;
    private $postalCode;
    private $province;
    private $administratorID;
	private $status;
    private $hugoteestgit;  //test git
	
    function getUserName() {
        return $this->userName;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }
	
	function getSalt() {
        return $this->salt;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }
	
	 function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getAddress() {
        return $this->address;
    }

    function getCity() {
        return $this->city;
    }

    function getPostalCode() {
        return $this->postalCode;
    }

    function getProvince() {
        return $this->province;
    }

    function getAdministratorID() {
        return $this->administratorID;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAddress($adress) {
        $this->address = $adress;
    }

    function setCity($city) {
        $this->city = $city;
    }

	
    function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }

    function setProvince($province) {
        $this->province = $province;
    }

    function setAdministratorID($administratorID) {
        $this->administratorID = $administratorID;
    }
}

?>