<?php
	//Uncomment to enable error reporting (Highlight and ctrl+/)
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Authorization");
	header("Referrer-Policy: strict-origin-when-cross-origin");

	$servername = "localhost";
	$username = "group2";
	$password = "password";
	$db = "dbname";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
