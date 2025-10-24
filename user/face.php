<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Face</title>
	<link rel="stylesheet" href="../assets/css/shop.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<Header>
		<div class="branding-bar">
			<img class="logo" src="../assets/images/Logo.png" alt="Logo">
			<p class="name">Beautyvine</p>
			<div class="action-btn">
				<a href="#">LOGIN</a>
				<p>|</p>
				<a href="#">REGISTER</a>
			</div>
		</div>
		<nav>
			<div class="left-placeholder"></div>
			<ul>
				<li><a href="#">HOME</a></li>
				<li><a href="#">BRANDS</a></li>
				<li><a href="#">SHOP</a></li>
				<li><a href="#">ABOUT US</a></li>
				<li><a href="#">CUSTOMER SUPPORT</a></li>
			</ul>
			<div class="nav-extra-btn">
				<div class="search-container">
					<input type="text" placeholder="Search here ... ">
					<img src="../assets/icons/search.png" alt="Search">
				</div>
				<div>
					<a href="#">
						<img src="../assets/icons/cart.png" alt="Cart">
					</a>
					<a href="#">
						<img src="../assets/icons/favorite.png" alt="Favorite">
					</a>
				</div>
			</div>
		</nav>
	</Header>


	<main>
		<section class="shop">
			<h3>Face</h3>
			<div class="product-container">

			</div>

		</section>

	</main>

	<!-- footer -->
	<Footer>
		<div class="logo-container">
			<img class="logo" src="../assets/images/Logo.png" alt="Logo">
			<p class="name">Beautyvine</p>
		</div>
		<ul>
			<li><a href="#">HOME</a></li>
			<li><a href="#">BRANDS</a></li>
			<li><a href="#">SHOP</a></li>
			<li><a href="#">ABOUT US</a></li>
			<li><a href="#">CUSTOMER SUPPORT</a></li>
		</ul>
		<div class="socials">
			<a href="#"><img src="../assets/icons/facebook.png" alt="Facebook"></a>
			<a href="#"><img src="../assets/icons/instagram.png" alt="Instagram"></a>
			<a href="#"><img src="../assets/icons/email.png" alt="email"></a>
		</div>
		<p>@2025 Beautyvine Philippines . All Right Reserved.Store Specialist . Inc</p>
	</Footer>

	<!-- script -->
	<script>
		const container = document.querySelector('.product-container');

		const getData = async () => {
			try {
				const res = await fetch('../db/get_all_products.php');
				const data = await res.json();
				displayData(data);
			} catch (err) {
				console.error('Fetch failed:', err);
				alert('Error loading products.');
			}
		};

		const displayData = (data) => {
			container.innerHTML += '';

			if (data.length > 0) {
				data.forEach(product => {

					if (product.tags === "face") {

						const card = document.createElement('div');
						card.classList.add('card');
						card.innerHTML = `
						<img src="../db/${product.img_url}" alt="${product.name}">
						<p class="name">${product.name}</p>
						<p class="price">₱${product.price}</p>
						<a class="overlay" href="selected_product.php?id=${product.id}">
							<p>ADD TO CART</p>
						</a>
					`;
						container.appendChild(card);

					}

				});
			}
		};

		// Run on page load
		getData();
	</script>
</body>

</html>