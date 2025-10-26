<?php
include('conn.php');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	echo json_encode(["ok" => false, "message" => "Invalid request method"]);
	exit;
}

$id = $_POST['id'] ?? null;
if (!$id) {
	echo json_encode(["ok" => false, "message" => "Missing product ID"]);
	exit;
}

$type = $_POST['type'] ?? 'full';

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$tags = $_POST['tags'] ?? '';
$price = $_POST['price'] ?? 0;
$quantity = $_POST['quantity'] ?? 0;

$uploads_dir = 'uploads/';
if (!file_exists($uploads_dir)) mkdir($uploads_dir, 0777, true);
$imagePath = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
	$unique_name = time() . '_' . basename($_FILES['image']['name']);
	$target_path = $uploads_dir . $unique_name;

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
		$imagePath = $target_path;
	} else {
		echo json_encode(["ok" => false, "message" => "Failed to upload image."]);
		exit;
	}
}

try {
	if ($type === 'simple') {
		$stmt = $conn->prepare("UPDATE products SET price = ?, quantity = ? WHERE id = ?");
		$stmt->execute([$price, $quantity, $id]);
		echo json_encode(["ok" => true, "message" => "Product (price & quantity) updated successfully!"]);
	} else {
		if ($imagePath) {
			$stmt = $conn->prepare("
				UPDATE products 
				SET name = ?, description = ?, tags = ?, price = ?, quantity = ?, img_url = ?
				WHERE id = ?
			");
			$stmt->execute([$name, $description, $tags, $price, $quantity, $imagePath, $id]);
		} else {
			$stmt = $conn->prepare("
				UPDATE products 
				SET name = ?, description = ?, tags = ?, price = ?, quantity = ?
				WHERE id = ?
			");
			$stmt->execute([$name, $description, $tags, $price, $quantity, $id]);
		}

		echo json_encode(["ok" => true, "message" => "Product updated successfully!"]);
	}
} catch (PDOException $e) {
	echo json_encode(["ok" => false, "message" => "Database error: " . $e->getMessage()]);
}
