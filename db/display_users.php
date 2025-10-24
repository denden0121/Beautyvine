<?php

include 'conn.php';
$stmt = $conn->prepare('SELECT * FROM users;');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);
