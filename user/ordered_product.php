<?php
session_start();
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];
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
	<title>Order</title>
	<link rel="stylesheet" href="../assets/css/ordered_product.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<?php include('header.php'); ?>

	<main>
		<section class="shop">
			<h3>Ordered Products</h3>
			<div class="selected-container">
				<div class="display">
					<h4>Product</h4>
					<h4>Quantity</h4>
					<h4>Total Price</h4>
					<h4>Payment Method</h4>
					<h4>To Receive</h4>
				</div>
			</div>
		</section>
	</main>

	<!-- footer -->
	<?php include('footer.php'); ?>

	<!-- script -->
	<script>
		const userId = "<?php echo htmlspecialchars($userId); ?>";
		const getAllCart = async () => {
			try {
				const res = await fetch('../db/get_all_ordered.php', {
					method: 'POST',
					body: JSON.stringify({
						userId,
					})
				})
				const allProductRes = await fetch('../db/get_all_products.php');

				const data = await res.json();
				const allProductData = await allProductRes.json();

				console.log(data)
				console.log(allProductData)
				displayData(data, allProductData);
			} catch (err) {
				console.error(err);
			}
		}

		const container = document.querySelector('.selected-container');

		const displayData = (data, allProductData) => {
			if (!data || data.length === 0) {
				container.innerHTML = '<p>No products found in ordered.</p>';
				return;
			}

			container.innerHTML += '';

			data.forEach(product => {
				const match = allProductData.find(all => all.id == product.productId);

				if (match) {
					const card = document.createElement('div');
					card.classList.add('display');
					card.innerHTML += `
						<p class="name">${match.name}</p>
						<p class="quantity">x${product.quantity}</p>
						<p class="total-price">₱${product.quantity * match.price}</p>
						<p class="method">Cash on deliver</p>
						<button class="buy" onClick="removeOrderedProduct(${product.id})">Order Received</button>
					
					`;
					container.appendChild(card);
				}
			});
		};

		getAllCart();
	</script>

	<script>
		const removeCartProduct = async (userId, product) => {
			console.log(`user: ${userId} product: ${product}`)

			try {
				const res = await fetch('../db/remove_to_cart.php', {
					method: 'POST',
					body: JSON.stringify({
						userId,
						product
					})
				})

				const data = await res.json();
				alert(data.message)
				location.reload();
			} catch (err) {
				console.error(err);
			}
		}
	</script>

	<script>
		const removeOrderedProduct = async (productId) => {
			console.log(`product: ${productId}`)

			try {
				const res = await fetch('../db/remove_to_ordered.php', {
					method: 'POST',
					body: JSON.stringify({
						productId
					})
				})

				const data = await res.json();
				alert(data.message)
				location.reload();
			} catch (err) {
				console.error(err);
			}
		}
	</script>

</body>

</html>