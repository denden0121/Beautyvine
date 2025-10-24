<?php
session_start();
include 'conn.php';


$json_data =  file_get_contents('php://input');
$data = json_decode($json_data, true);

$username = $data['name'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();
$checker = $stmt->fetch(PDO::FETCH_ASSOC);

if ($checker) {
	$users = [
		"message" => "email_taken"
	];
	header('Content-Type: application/json');
	echo json_encode($users);
} else {
	// $stmt = $conn->prepare('INSERT INTO users (username, pass, first_name, last_name, classification, organization, phone_number, email) VALUES (:username, :pass, :first_name, :last_name, :classification, :organization, :phone_number, :email)');

	// $stmt->bindParam(':username', $username);
	// $stmt->bindParam(':pass', $password);
	// $stmt->bindParam(':first_name', $firstName);
	// $stmt->bindParam(':last_name', $lastName);
	// $stmt->bindParam(':classification', $classification);
	// $stmt->bindParam(':organization', $organization);
	// $stmt->bindParam(':phone_number', $phoneNumber);
	// $stmt->bindParam(':email', $email);
	// $users = array();

	// if ($stmt->execute()) {
	// 	$users = [
	// 		"message" => "success",
	// 	];
	// 	header('Content-Type: application/json');
	// 	echo json_encode($users);
	// } else {
	// 	$users = [
	// 		"message" => "fail",
	// 	];
	// 	header('Content-Type: application/json');
	// 	echo json_encode($users);
	// }


	$users = [
		"message" => "success"
	];
	header('Content-Type: application/json');
	echo json_encode($users);
}
