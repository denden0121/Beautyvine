<?php
include('conn.php');
header('Content-Type: application/json');

$users = array();

$stmt = $conn->prepare('SELECT * FROM users');

if ($stmt->execute()) {
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) {
		$users[] = $row;
	}
	echo json_encode($users);
} else {
	echo json_encode([
		"ok" => false,
		"message" => "Getting users data failed"
	]);
}
