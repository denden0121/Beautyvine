<?php
session_start();
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];
if (!isset($_SESSION['username'])) {
	header('Location: ../index.php');
	exit;
}

if (isset($_GET['userId']) && isset($_GET['product']) && isset($_GET['manageStock'])) {
	$userId = $_GET['userId'];
	$productId = $_GET['product'];
	$manageStock = $_GET['manageStock'];
} else {
	header('Location: cart.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Place Order</title>
	<link rel="stylesheet" href="../assets/css/place_order.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<?php include('header.php'); ?>

	<main>

		<section class="payment-container">

			<div class="modal">
				<div class="row">
					<h3>Product Details</h3>
					<p></p>
				</div>
				<div class="row">
					<p>Price</p>
					<p class="price">₱</p>
				</div>
				<div class="row">
					<p>In Stock</p>
					<p class="quantity"></p>
				</div>
			</div>

			<div class="modal">
				<div class="row">
					<h3>Delivery Information</h3>
					<p></p>
				</div>
				<div class="row">
					<p>Payment Method</p>
					<p>Cash on delivery</p>
				</div>
				<div class="row">
					<p>Estimated delivery</p>
					<p>3-5 business days</p>
				</div>
				<div class="row">
					<p>Order tracking</p>
					<p>Not Available</p>
				</div>
			</div>

			<div class="modal">
				<div class="row">
					<h3>Order Summary</h3>
					<p></p>
				</div>
				<div class="row">
					<p>Price</p>
					<p class="price-order">₱</p>
				</div>
				<div class="row">
					<p>Quantity</p>
					<p class="cart-quantity">x</p>
				</div>
				<div class="row total-payment-container">
					<p>Total Payment</p>
					<p class="total-cost">₱</p>
				</div>
				<div class="col">
					<button class="order-btn" onClick="placeOrderProduct()">Place Order</button>
					<a href="cart.php" class="cancel-btn">Cancel</a>
				</div>
			</div>

		</section>

	</main>

	<!-- footer -->
	<?php include('footer.php'); ?>

	<!-- script -->
	<script>
		const userId = "<?php echo htmlspecialchars($userId); ?>";
		const productId = "<?php echo htmlspecialchars($productId); ?>";
		const manageStock = "<?php echo htmlspecialchars($manageStock); ?>";
		const price = document.querySelector('.price');
		const priceOrder = document.querySelector('.price-order');
		const quantity = document.querySelector('.quantity');
		const cartQuantity = document.querySelector('.cart-quantity');
		const totalCost = document.querySelector('.total-cost');

		const getData = async () => {
			try {
				const res = await fetch('../db/get_cart.php', {
					method: 'POST',
					body: JSON.stringify({
						userId,
						productId
					})
				})

				const data = await res.json();
				const findProduct = data[0].productId;

				const productDataRes = await fetch('../db/get_product.php', {
					method: 'POST',
					body: JSON.stringify({
						findProduct
					})
				})

				const productData = await productDataRes.json();

				displayCartData(data, productData);

			} catch (err) {
				console.error(err);
			}
		};

		getData();
		console.log("userId: " + userId + " productId: " + productId);

		//userId user id
		// productId this is the cart id that needs to be removed when order placed 
		//quantity of the product ordered
		//total cost of the product ordered

		let orderProductId;
		let orderUserId;
		let orderQuantity;
		let orderTotalCost;
		let updatedStock;
		let availableStock;


		const displayCartData = (data, productData) => {
			console.log(productData);
			console.log(data)

			price.innerText += productData[0].price;
			priceOrder.innerText += productData[0].price;
			quantity.innerText = productData[0].quantity + " available";
			cartQuantity.innerText += data[0].quantity;
			totalCost.innerText += (data[0].quantity * productData[0].price);

			//declare order data
			orderProductId = manageStock;
			orderUserId = userId;
			orderQuantity = data[0].quantity;
			orderTotalCost = (data[0].quantity * productData[0].price);

			//test
			console.log(productData[0].quantity - data[0].quantity)
			updatedStock = productData[0].quantity - data[0].quantity;
			availableStock = productData[0].quantity;

		}



		const placeOrderProduct = async () => {

			if (availableStock >= orderQuantity) {
				//save the ordered product 
				try {
					const res = await fetch('../db/add_to_ordered.php', {
						method: 'POST',
						body: JSON.stringify({
							orderUserId,
							orderProductId,
							orderQuantity,
							orderTotalCost,
							updatedStock
						})
					})

					const data = await res.json();
					alert(data.message);
					window.location.href = "cart.php";
				} catch (err) {
					console.error(err);
				}

				//remove the product to the cart
				const product = productId;
				try {
					const res = await fetch('../db/remove_to_cart.php', {
						method: 'POST',
						body: JSON.stringify({
							userId,
							product
						})
					})

					const data = await res.json();
				} catch (err) {
					console.error(err);
				}

			} else {
				alert('Not enough stock available');
			}

		}
	</script>
</body>

</html>