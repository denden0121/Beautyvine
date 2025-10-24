<?php
session_start();
include 'conn.php';

$email = trim($_POST['email'] ?? '');
$password_raw = $_POST['password'] ?? '';

if (empty($email) || empty($password_raw)) {
	echo "<script>alert('Please fill in all fields'); window.history.back();</script>";
	exit;
}

$stmt = $conn->prepare('SELECT * FROM users WHERE BINARY email = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password_raw, $user['password'])) {

	$_SESSION['username'] = $user['username'];
	$_SESSION['userId'] = $user['id'];
	$_SESSION['email'] = $user['email'];
	$_SESSION['login'] = true;

	header('Location: ../user/index.php');
	exit;
} else {
	echo "<script>alert('Invalid email or password'); window.history.back();</script>";
	exit;
}
