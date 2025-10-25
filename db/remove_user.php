<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$userId = $data['userId'];

$stmt = $conn->prepare('DELETE FROM users WHERE id = :userId');
$stmt->bindParam(':userId', $userId);

$response = [];

if ($stmt->execute()) {

	$stmtCart = $conn->prepare('DELETE FROM cart WHERE userId = :userId');
	$stmtCart->bindParam(':userId', $userId);
	$stmtCart->execute();

	$response = [
		"ok" => true,
		"message" => "User removed successfully!"
	];
} else {
	$response = [
		"ok" => false,
		"message" => "User not found."
	];
}

header('Content-Type: application/json');
echo json_encode($response);
