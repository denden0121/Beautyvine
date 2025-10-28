<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category</title>
	<link rel="stylesheet" href="../assets/css/category.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
	<link rel="stylesheet" href="../assets/css/slide.css">
</head>

<body>
	<!-- hero section -->
	<?php include('landing_header.php'); ?>

	<section class="hero">
		<div class="slider">
			<div class="slides" id="slides">
				<img src="../assets/images/silder/4.png" alt="Slide 1">
				<img src="../assets/images/silder/3.png" alt="Slide 2">
				<img src="../assets/images/silder/2.png" alt="Slide 3">
				<img src="../assets/images/silder/1.png" alt="Slide 4">
			</div>
		</div>
	</section>
	<main>

		<section id="show-now" class="best-seller">
			<h3>Shop By Category</h3>
			<ul>
				<li>
					<a href="../login.php">
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
					<a href="../login.php">
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
					<a href="../login.php">
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
					<a href="../login.php">
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
					<a href="../login.php">
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
	<?php include('landing_footer.php'); ?>

	<!-- slides -->
	<script>
		const slides = document.getElementById("slides");
		const totalSlides = slides.children.length;
		let index = 0;

		setInterval(() => {
			index = (index + 1) % totalSlides;
			slides.style.transform = `translateX(-${index * 100}%)`;
		}, 2000);
	</script>

	<!-- nav search  -->
	<script>
		const searchBtn = document.querySelector(".nav-search-btn");
		searchBtn.addEventListener('click', () => {
			const find = document.querySelector(".nav-search-input").value;
			alert('searching: ' + find)
		})
	</script>
</body>

</html>