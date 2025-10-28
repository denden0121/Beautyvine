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
			<h3>Lips</h3>
			<div class="product-container"></div>
		</section>
	</main>

	<!-- footer -->
	<?php include('footer.php'); ?>

	<!-- script -->
	<script>
		const container = document.querySelector('.product-container');
		let cacheData;

		const getData = async () => {
			try {
				const res = await fetch('../db/get_all_products.php');
				const data = await res.json();
				cacheData = data;
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

					if (product.tags === "lips") {

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


	<script>
		const searchBtn = document.querySelector(".nav-search-btn");
		const find = document.querySelector(".nav-search-input");

		find.addEventListener('input', () => {
			const query = find.value.toLowerCase().trim();
			const filtered = cacheData.filter(p =>
				p.name.toLowerCase().includes(query)
			);

			console.log(filtered);
			displayFilteredData(filtered);

		});

		searchBtn.addEventListener('click', () => {
			console.log('search button clicked, searching for: ' + find.value);
		});

		// display filterd
		const displayFilteredData = (data) => {
			container.innerHTML = '';
			container.innerHTML += '';

			if (data.length > 0) {
				data.forEach(product => {


					if (product.tags === "lips") {
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
	</script>
</body>

</html>