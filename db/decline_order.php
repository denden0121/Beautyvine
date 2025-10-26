<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$productId = $data['productId'];

$stmt = $conn->prepare('UPDATE ordered SET status = "declined" WHERE id = :productId');

$stmt->bindParam(':productId', $productId);

$response = array();

if ($stmt->execute()) {
	$response = [
		"ok" => true,
		"message" => "Order has been declined!"
	];
} else {
	$response = [
		"ok" => false,
		"message" => "Failed to accept!"
	];
}

header('Content-Type: application/json');
echo json_encode($response);
