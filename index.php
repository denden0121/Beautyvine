<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Beautyvine</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/footer-header.css">
</head>

<body>
	<Header>
		<div class="branding-bar">
			<img class="logo" src="assets/images/Logo.png" alt="Logo">
			<p class="name">Beautyvine</p>
			<div class="action-btn">
				<a href="login.php">LOGIN</a>
				<p>|</p>
				<a href="register.php">REGISTER</a>
			</div>
		</div>
		<nav>
			<div class="left-placeholder"></div>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="user/landing_category.php">SHOP</a></li>
				<li><a href="user/landing_about.php">ABOUT US</a></li>
				<li><a href="user/landing_faq.php">CUSTOMER SUPPORT</a></li>
			</ul>
			<div class="nav-extra-btn">
				<div class="search-container">
					<input class="nav-search-input" type="text" placeholder="Search here ... ">
					<img class="nav-search-btn" src="assets/icons/search.png" alt="Search">
				</div>
				<div>
					<a href="login.php">
						<img src="assets/icons/cart.png" alt="Cart">
					</a>
					<a href="login.php">
						<img src="assets/icons/purchase_black.png" alt="Purchase">
					</a>
				</div>
			</div>
		</nav>
	</Header>


	<section class="hero">
		<div class="slider">
			<div class="slides" id="slides">
				<img src="assets/images/silder/4.png" alt="Slide 1">
				<img src="assets/images/silder/3.png" alt="Slide 2">
				<img src="assets/images/silder/2.png" alt="Slide 3">
				<img src="assets/images/silder/1.png" alt="Slide 4">
			</div>
		</div>
	</section>

	<main>

		<section id="show-now" class="best-seller">
			<h3>Recommended Product</h3>
			<p>Shop the latest product you love</p>
			<div class="product-container">
			</div>
		</section>

	</main>

	<!-- footer -->
	<Footer>
		<div class="logo-container">
			<img class="logo" src="assets/images/Logo.png" alt="Logo">
			<p class="name">Beautyvine</p>
		</div>
		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="user/landing_category.php">SHOP</a></li>
			<li><a href="user/landing_about.php">ABOUT US</a></li>
			<li><a href="user/landing_faq.php">CUSTOMER SUPPORT</a></li>
		</ul>
		<div class="socials">
			<a href="facebook.com"><img src="assets/icons/facebook.png" alt="Facebook"></a>
			<a href="instagram.com"><img src="assets/icons/instagram.png" alt="Instagram"></a>
			<a href="gmail.com"><img src="assets/icons/email.png" alt="email"></a>
		</div>
		<p>@2025 Beautyvine Philippines . All Right Reserved.Store Specialist . Inc</p>
	</Footer>

	<!-- script -->
	<script>
		const container = document.querySelector('.product-container');

		const getData = async () => {
			try {
				const res = await fetch('db/get_all_products.php');
				const data = await res.json();
				displayData(data);
				console.log(data);
			} catch (err) {
				console.error('Fetch failed:', err);
				alert('Error loading products.');
			}
		};

		const displayData = (data) => {
			const limit = 6;
			let diplayCount = 0;

			container.innerHTML += '';

			data.forEach(product => {

				if (diplayCount < limit) {

					const li = document.createElement('li');
					li.innerHTML = `
						<div class="card">
							<p class="title">686 Lipstick Snob</p>
							<img src="db/${product.img_url}" alt="${product.name}">
							<p class="name">${product.name}</p>
							<p class="price">₱${product.price}</p>
							<a class="overlay" href="login.php">
								<p>ADD TO CART</p>
							</a>
						</div>
					`;
					container.appendChild(li);

					diplayCount++;
				}

			});
		};

		getData();
	</script>

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