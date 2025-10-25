<?php
include('conn.php');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'] ?? '';
	$description = $_POST['description'] ?? '';
	$tags = $_POST['tags'] ?? '';
	$price = $_POST['price'] ?? 0;
	$quantity = $_POST['quantity'] ?? 0;

	$check = $conn->prepare("SELECT * FROM products WHERE name = ?");
	$check->execute([$name]);
	$existing = $check->fetch(PDO::FETCH_ASSOC);

	if ($existing) {
		echo json_encode([
			"ok" => false,
			"message" => "Product already exists!"
		]);
		exit;
	}

	if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
		$uploads_dir = 'uploads/';
		if (!file_exists($uploads_dir)) mkdir($uploads_dir, 0777, true);

		$unique_name = time() . '_' . basename($_FILES['image']['name']);
		$target_path = $uploads_dir . $unique_name;

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
			$stmt = $conn->prepare("
                INSERT INTO products (name, description, tags, price, quantity, img_url)
                VALUES (?, ?, ?, ?, ?, ?)
            ");
			$stmt->execute([$name, $description, $tags, $price, $quantity, $target_path]);

			echo json_encode([
				"ok" => true,
				"message" => "Product uploaded successfully!"
			]);
		} else {
			echo json_encode([
				"ok" => false,
				"message" => "Failed to move uploaded file."
			]);
		}
	} else {
		echo json_encode([
			"ok" => false,
			"message" => "No image uploaded."
		]);
	}
}
