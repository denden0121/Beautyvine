<?php
include('conn.php');
header('Content-Type: application/json');

$products = array();

$stmt = $conn->prepare('SELECT * FROM ordered');

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
