<?php
session_start();
include 'conn.php';

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$username = trim($data['name']);
$email = trim($data['email']);
$password = password_hash($data['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->fetch(PDO::FETCH_ASSOC)) {
	echo json_encode(["message" => "email_taken"]);
	exit;
}

$stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

if ($stmt->execute()) {
	echo json_encode(["message" => "success"]);
} else {
	echo json_encode(["message" => "fail"]);
}

header('Content-Type: application/json');
