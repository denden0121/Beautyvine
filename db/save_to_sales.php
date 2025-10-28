<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$userId = $data['userId'];
$productId = $data['productId'];
$productQuantity = $data['productQuantity'];
$productTotal = $data['productTotal'];

$stmt = $conn->prepare('INSERT INTO sales (userId, productId, productQuantity, productTotal) VALUE (:userId, :productId, :productQuantity, :productTotal)');

$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':productId', $productId);
$stmt->bindParam(':productQuantity', $productQuantity);
$stmt->bindParam(':productTotal', $productTotal);

$response = array();

if ($stmt->execute()) {

	$response = [
		"ok" => true,
		"message" => "Order received!"
	];
} else {
	$response = [
		"ok" => false,
		"message" => "Failed to receive!"
	];
}

header('Content-Type: application/json');
echo json_encode($response);
