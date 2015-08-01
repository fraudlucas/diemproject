<?php

class ConnectionDAOPdo {

	public static function getConnection() {
		$dbname = "angelamark";
		$dbusername = "root";
		$dbhost = "localhost";
		$dbpassword = "";

		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
}

?>