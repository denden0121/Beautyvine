<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$productId = $data['productId'];

$stmt = $conn->prepare('SELECT img_url FROM products WHERE id = :productId');
$stmt->bindParam(':productId', $productId);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

$response = [];

if ($product) {
	$imagePath = $product['img_url'];

	$stmt = $conn->prepare('DELETE FROM products WHERE id = :productId');
	$stmt->bindParam(':productId', $productId);

	if ($stmt->execute()) {
		if (file_exists($imagePath)) {
			unlink($imagePath);
		}

		$stmtCart = $conn->prepare('DELETE FROM cart WHERE productId = :productId');
		$stmtCart->bindParam(':productId', $productId);
		$stmtCart->execute();

		$response = [
			"ok" => true,
			"message" => "Product removed successfully!"
		];
	} else {
		$response = [
			"ok" => false,
			"message" => "Failed to remove product."
		];
	}
} else {
	$response = [
		"ok" => false,
		"message" => "Product not found."
	];
}

header('Content-Type: application/json');
echo json_encode($response);
