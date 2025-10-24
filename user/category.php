<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
	header('Location: ../index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category</title>
	<link rel="stylesheet" href="../assets/css/category.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<?php include('header.php'); ?>

	<main>

		<!-- hero section -->
		<?php include('hero_section.php'); ?>

		<section id="show-now" class="best-seller">
			<h3>Shop By Category</h3>
			<ul>
				<li>
					<a href="face.php">
						<div class="card">
							<img src="../assets/images/face.png" alt="">
							<div class="overlay">
								<h1 class="title">Face</h1>
								<p>Shop now</p>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="eyes.php">
						<div class="card">
							<img src="../assets/images/eyes.png" alt="">
							<div class="overlay">
								<h1 class="title">Eyes</h1>
								<p>Shop now</p>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="cheek.php">
						<div class="card">
							<img src="../assets/images/cheeks.png" alt="">
							<div class="overlay">
								<h1 class="title">Cheeks</h1>
								<p>Shop now</p>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="lips.php">
						<div class="card">
							<img src="../assets/images/lips.png" alt="">
							<div class="overlay">
								<h1 class="title">Lips</h1>
								<p>Shop now</p>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="tools.php">
						<div class="card">
							<img src="../assets/images/tools.png" alt="">
							<div class="overlay">
								<h1 class="title">Tools & Accessories</h1>
								<p>Shop now</p>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</section>

	</main>

	<!-- footer -->
	<?php include('footer.php'); ?>

</body>

</html>