<?php
session_start();
include('conn.php');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);
$products = array();

$productId = $data['productId'];

$stmt = $conn->prepare('SELECT * FROM products WHERE id = :productId');
$stmt->bindParam(':productId', $productId);

if ($stmt->execute()) {
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) {
		$products[] = $row;
	}
	echo json_encode($products);
} else {
	echo json_encode([
		"ok" => false,
		"message" => "Getting products data failed"
	]);
}
