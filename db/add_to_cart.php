<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$userId = $data['userId'];
$productId = $data['productId'];
$finalQuantity = $data['initialQuantity'];

$stmt = $conn->prepare('INSERT INTO cart (userId, productId, quantity) VALUE (:userId, :productId, :quantity)');

$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':productId', $productId);
$stmt->bindParam(':quantity', $finalQuantity);

$response = array();

if ($stmt->execute()) {
	$response = [
		"ok" => true,
		"message" => "Product added to cart successful!"
	];
} else {
	$response = [
		"ok" => false,
		"message" => "Product failed to add!"
	];
}

header('Content-Type: application/json');
echo json_encode($response);
