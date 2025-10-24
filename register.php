<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
	<main>
		<section class="login">
			<h4>Register</h4>
			<form class="input">
				<label>
					<img src="assets/icons/login_email.png" alt="name">
					<input id="name" type="text" placeholder="Enter name..." required>
				</label>
				<label>
					<img src="assets/icons/login_email.png" alt="email">
					<input id="email" type="email" placeholder="Enter email..." required>
				</label>
				<label>
					<img src="assets/icons/login_password.png" alt="password">
					<input id="password" type="password" placeholder="Enter password..." required>
				</label>
				<label>
					<img src="assets/icons/login_password.png" alt="confirm-password">
					<input id="confirm_password" type="password" placeholder="Confirm password..." required>
				</label>
				<button id="submit">Register</button>
			</form>
			<p>
				Already have an account? <a href="index.php">Sign in</a>
			</p>
		</section>
		<section class="banner">
			<img src="assets/images/login_bg.png" alt="">
		</section>
	</main>

	<script>
		document.getElementById('submit').addEventListener('click', async (e) => {
			e.preventDefault();

			const name = document.getElementById('name').value.trim();
			const email = document.getElementById('email').value.trim();
			const password = document.getElementById('password').value;
			const confirmPassword = document.getElementById('confirm_password').value;

			if (!name || !email || !password) {
				alert("All fields are required.");
				return;
			}

			if (password !== confirmPassword) {
				alert("Passwords don't match!");
				return;
			}

			try {
				const res = await fetch('db/user_signup.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						name,
						email,
						password
					})
				});
				const data = await res.json();

				if (data.message === "email_taken") {
					alert("Email already registered.");
				} else if (data.message === "success") {
					alert("Account created successfully!");
					window.location.href = "index.php";
				} else {
					alert("Something went wrong.");
				}
			} catch (err) {
				console.error(err);
				alert("Error connecting to server.");
			}
		});
	</script>
</body>

</html>