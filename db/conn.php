<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "beautyvine_db";

try {
	$conn = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8', $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo "Database Connection Error";
	exit();
}
