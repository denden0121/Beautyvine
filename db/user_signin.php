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
	if ($user['designation'] === "admin") {
		$_SESSION['login'] = true;
		$_SESSION['email'] = $user['email'];
		$_SESSION['status'] = $user['status'];
		if ($user['status'] === "verified") {
			// header('Location: ../admin/manage_product.php');
			header('Location: ../admin/dashboard.php');
			exit;
		} else {
			echo "<script>alert('Account may not be verified'); window.history.back();</script>";
			exit;
		}
	} elseif ($user['designation'] === "user") {
		$_SESSION['username'] = $user['username'];
		$_SESSION['userId'] = $user['id'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['designation'] = $user['designation'];
		$_SESSION['login'] = true;
		$_SESSION['status'] = $user['status'];
		if ($user['status'] === "verified") {
			header('Location: ../user/index.php');
			exit;
		} else {
			echo "<script>alert('Account may not be verified'); window.history.back();</script>";
			exit;
		}
	}
} else {
	echo "<script>alert('Invalid email or password'); window.history.back();</script>";
	exit;
}
