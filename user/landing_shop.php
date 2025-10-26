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
	<title>Shop</title>
	<link rel="stylesheet" href="../assets/css/shop.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<?php include('landing_header.php'); ?>

	<main>
		<section class="shop">
			<h3>Eyes</h3>
			<div class="product-container">

			</div>

		</section>

	</main>


	<!-- footer -->
	<?php include('landing_footer.php'); ?>

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

			data.forEach(product => {

				if (product.tags === "face") {

					const card = document.createElement('div');
					card.classList.add('card');
					card.innerHTML = `
						<img src="../db/${product.img_url}" alt="${product.name}">
						<p class="name">${product.name}</p>
						<p class="price">₱${product.price}</p>
						<div class="overlay">
							<p>ADD TO CART</p>
						</div>
					`;
					container.appendChild(card);

				}

			});
		};

		// Run on page load
		getData();
	</script>
</body>

</html>