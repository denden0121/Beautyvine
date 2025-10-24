<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$userId = $data['userId'];
$productId = $data['product'];;

$stmt = $conn->prepare('DELETE FROM cart WHERE userId = :userId AND id = :productId');

$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':productId', $productId);

$response = array();

if ($stmt->execute()) {
	$response = [
		"ok" => true,
		"message" => "Product removed from the cart successful!"
	];
} else {
	$response = [
		"ok" => false,
		"message" => "Product failed to remove!"
	];
}

header('Content-Type: application/json');
echo json_encode($response);
