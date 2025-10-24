<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$orderUserId = $data['orderUserId'];
$orderProductId = $data['orderProductId'];
$orderQuantity = $data['orderQuantity'];
$orderTotalCost = $data['orderTotalCost'];
$updatedStock = $data['updatedStock'];

$stmt = $conn->prepare('INSERT INTO ordered (userId, productId, quantity, total) VALUE (:userId, :productId, :quantity, :total)');

$stmt->bindParam(':userId', $orderUserId);
$stmt->bindParam(':productId', $orderProductId);
$stmt->bindParam(':quantity', $orderQuantity);
$stmt->bindParam(':total', $orderTotalCost);

$response = array();

if ($stmt->execute()) {

	$updateStmt = $conn->prepare('UPDATE products SET quantity = :updatedStock WHERE id = :productId');
	$updateStmt->bindParam(':updatedStock', $updatedStock);
	$updateStmt->bindParam(':productId', $orderProductId);
	$updateStmt->execute();

	$response = [
		"ok" => true,
		"message" => "Place order successful!"
	];
} else {
	$response = [
		"ok" => false,
		"message" => "Product failed to order!"
	];
}

header('Content-Type: application/json');
echo json_encode($response);
