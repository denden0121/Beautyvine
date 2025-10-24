<?php
session_start();
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];
if (!isset($_SESSION['username'])) {
	header('Location: ../index.php');
	exit;
}
$id = $_GET['id'];
if (!isset($_GET['id'])) {
	header('Location: category.php');
	exit;
}
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
	<?php include('header.php'); ?>

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
							<p class="description"></p>
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
	<?php include('footer.php'); ?>

	<script>
		let initialQuantity = 1;
		const quantity = document.querySelector('.quantity');
		const incBtn = document.querySelector('.increase');
		const decBtn = document.querySelector('.decrease');

		quantity.innerText = initialQuantity;

		incBtn.addEventListener('click', () => {
			initialQuantity++;
			quantity.innerText = initialQuantity;
			console.log(initialQuantity);
		});

		decBtn.addEventListener('click', () => {
			if (initialQuantity > 1) {
				initialQuantity--;
				quantity.innerText = initialQuantity;
				console.log(initialQuantity);
			}
		});
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

	<script>
		const userId = "<?php echo htmlspecialchars($userId); ?>";
		const addToCart = async () => {
			try {
				const res = await fetch('../db/add_to_cart.php', {
					method: 'POST',
					body: JSON.stringify({
						userId,
						productId,
						initialQuantity,
					})
				})
				const data = await res.json();
				if (data.ok) {
					initialQuantity = 1;
					quantity.innerText = initialQuantity;
					alert(data.message)
				}
				console.log(data)
			} catch (err) {
				console.error(err);
			}
		}


		const addToCartBtn = document.querySelector('.btn-container');
		addToCartBtn.addEventListener('click', () => {
			addToCart();
		});
	</script>
</body>

</html>