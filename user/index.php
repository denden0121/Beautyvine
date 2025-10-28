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
	<title>Beautyvine</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<?php include('header.php'); ?>

	<main>

		<?php include('hero_section.php'); ?>

		<section id="show-now" class="best-seller">
			<h3>Recommended Product</h3>
			<p>Shop the latest product you love</p>
			<ul class="product-container">
			</ul>
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
							<img src="../db/${product.img_url}" alt="${product.name}">
							<p class="name">${product.name}</p>
							<p class="price">₱${product.price}</p>
							<a class="overlay" href="selected_product.php?id=${product.id}">
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
</body>

</html>