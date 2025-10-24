<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>More Details</title>
	<link rel="stylesheet" href="../assets/css/selected_product.css">
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
			<div class="selected-container">
				<div class="display">
					<div class="img-container">
						<img class="product-img" src="" alt="">
						<p class="price">₱</p>
						<a class="btn-container">
							<p class="cart-btn" href="#">ADD TO CART</p>
							<p href="#"><img src="../assets/icons/cart.png" alt=""></p>
						</a>
					</div>
					<div class="options">
						<h3 class="title"></h3>
						<p>Quantity</p>
						<div class="quantity-container">
							<button class="decrease">-</button>
							<p class="quantity">1</p>
							<button class="increase">+</button>
						</div>
						<div class="description-container">
							<h4>Product Description</h4>
							<p class="description">
								<!-- Product Description
								The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full
								coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps
								control
								shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan,
								and
								cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making
								it
								both effective and gentle. Whether worn alone or over foundation, this powder offers a
								natural-looking, long-lasting finish perfect for everyday use. -->
							</p>
						</div>
					</div>
				</div>
				<div class="extra-details">
					extra details
				</div>
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


	<script>
		let initialQuantity = 1;

		const incBtn = document.querySelector('.increase');
		const decBtn = document.querySelector('.decrease');
		const quantity = document.querySelector('.quantity');

		quantity.innerText = initialQuantity;

		incBtn.addEventListener('click', () => {
			let current = parseInt(quantity.innerText);
			quantity.innerText = current + 1;
		});

		decBtn.addEventListener('click', () => {
			let current = parseInt(quantity.innerText);
			if (current > 1) quantity.innerText = current - 1;
		})
	</script>

	<script>
		const productId = "<?php echo htmlspecialchars($id); ?>";
		const img = document.querySelector('.product-img');
		const price = document.querySelector('.price');
		const title = document.querySelector('.title');
		const description = document.querySelector('.description');
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

			console.log(data);
			console.log(productId)
			data.forEach(product => {
				if (product.id == productId) {
					title.innerText = product.name;
					price.innerText += product.price;
					description.innerText = product.description;
					img.src = `../db/${product.img_url}`;
				}
			});
		};

		getData();
	</script>
</body>

</html>