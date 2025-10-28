<?php
include('conn.php');
header('Content-Type: application/json');

$stmt = $conn->prepare("SELECT SUM(productTotal) AS total_sales FROM sales;");

if ($stmt->execute()) {
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$total_sales = $row['total_sales'] ?? 0;

	echo json_encode([
		"ok" => true,
		"total_sales" => $total_sales
	]);
} else {
	echo json_encode([
		"ok" => false,
		"message" => "Failed to calculate total sales."
	]);
}
