<?php
include('conn.php');
header('Content-Type: application/json');

$products = array();

// $sql = "
// 	SELECT 
// 		s.id, 
// 		s.productId, 
// 		s.productQuantity, 
// 		s.productTotal, 
// 		s.created_at, 
// 		p.name, 
// 		p.tags
// 	FROM sales AS s
// 	LEFT JOIN products AS p 
// 		ON s.productId = p.id;
// ";
$sql = "
	SELECT 
		p.tags AS category,
		COUNT(s.id) AS total_sales,
		SUM(s.productQuantity) AS total_quantity
	FROM sales AS s
	LEFT JOIN products AS p 
		ON s.productId = p.id
	GROUP BY p.tags
	ORDER BY total_sales DESC;
";


$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);
} else {
	echo json_encode([
		"ok" => false,
		"message" => "Getting products data failed"
	]);
}
