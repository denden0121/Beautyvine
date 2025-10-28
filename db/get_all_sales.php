<?php
include('conn.php');
header('Content-Type: application/json');

// Query both total sales and total product quantity, and count of sales
$stmt = $conn->prepare("
    SELECT 
        SUM(productTotal) AS total_sales,
        SUM(productQuantity) AS total_quantity,
        COUNT(*) AS total_orders
    FROM sales;
");

if ($stmt->execute()) {
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	echo json_encode([
		"ok" => true,
		"total_sales" => $row['total_sales'] ?? 0,
		"total_quantity" => $row['total_quantity'] ?? 0,
		"total_orders" => $row['total_orders'] ?? 0
	]);
} else {
	echo json_encode([
		"ok" => false,
		"message" => "Failed to calculate totals."
	]);
}
