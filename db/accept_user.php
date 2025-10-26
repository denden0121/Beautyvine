<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$userId = $data['userId'];

$stmt = $conn->prepare('UPDATE users SET status = "verified" WHERE id = :userId');

$stmt->bindParam(':userId', $userId);

$response = array();

if ($stmt->execute()) {
	$response = [
		"ok" => true,
		"message" => "User has been verified!"
	];
} else {
	$response = [
		"ok" => false,
		"message" => "Failed to accept!"
	];
}

header('Content-Type: application/json');
echo json_encode($response);
