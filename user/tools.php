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
	<title>Face</title>
	<link rel="stylesheet" href="../assets/css/shop.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<?php include('header.php'); ?>

	<main>
		<section class="shop">
			<h3>Tools & Accessories</h3>
			<div class="product-container"></div>
		</section>
	</main>

	<!-- footer -->
	<?php include('footer.php'); ?>

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

					if (product.tags === "tools") {

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