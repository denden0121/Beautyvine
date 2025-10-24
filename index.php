<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<main>
		<section class="login">
			<h4>Login</h4>
			<form class="input" action="db/user_signin.php" method="POST">
				<label for="email">
					<img src="assets/icons/login_email.png" alt="email">
					<input type="email" name="email" placeholder="Enter email...">
				</label>
				<label for="password">
					<img src="assets/icons/login_password.png" alt="password">
					<input type="password" name="password" placeholder="Enter password...">
				</label>
				<button>Login</button>
			</form>
			<p>
				Don’t have an account? <a href="#">Register</a>
			</p>
		</section>
		<section class="banner">
			<img src="assets/images/login_bg.png" alt="">
		</section>
	</main>

</body>

</html>