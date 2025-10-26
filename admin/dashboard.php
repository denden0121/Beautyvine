<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('Location: ../index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/admin_dashboard.css">
</head>

<body>
	<div class="wrapper">

		<?php include('dashboard_nav.php') ?>

		<main class="main">
			<div class="welcome">
				<h1>Dashhboard Overview</h1>
			</div>
			<div class="dashboard-info">
				<section class="overview">
					<div class="overview-cards">
						<h4 class="total-product"></h4>
						<p>Total Products</p>
					</div>
					<div class="overview-cards">
						<h4 class="total-user"></h4>
						<p>Total Customers</p>
					</div>
					<div class="overview-cards">
						<h4 class="total-order"></h4>
						<p>Total Ordered</p>
					</div>
					<div class="overview-cards">
						<h4 class="total-sales">₱</h4>
						<p>Total Sales</p>
					</div>
				</section>
			</div>
			<div class="dashboard-banner">
				<img src="../assets/images/dashboard_banner.png" alt="">
			</div>
		</main>
	</div>

	<script>
		let isOn = true;

		const navToggle = () => {
			const nav = document.querySelector('.nav');

			if (isOn) {
				nav.classList.add('hide-nav');
			} else {
				nav.classList.remove('hide-nav');
			}
			isOn = !isOn;
		};
	</script>

	<script>
		const totalProduct = document.querySelector('.total-product');
		const totalUser = document.querySelector('.total-user');
		const totalOrder = document.querySelector('.total-order');
		const totalSales = document.querySelector('.total-sales');

		const getData = async () => {
			try {
				const prodRes = await fetch('../db/get_all_products.php');
				const userRes = await fetch('../db/get_all_user.php');
				const orderRes = await fetch('../db/get_all_orders.php');
				const salesRes = await fetch('../db/get_all_sales.php');
				const prodData = await prodRes.json();
				const userData = await userRes.json();
				const orderData = await orderRes.json();
				const salesData = await salesRes.json();

				console.log(prodData)
				console.log(userData)
				console.log(orderData)
				console.log(salesData)
				displayData(prodData, userData, orderData, salesData);
			} catch (err) {
				console.error('Fetch failed:', err);
				// alert('Error loading products.');
			}
		};

		getData()

		const displayData = (prodData, userData, orderData, salesData) => {
			totalProduct.innerText = prodData.length;
			totalUser.innerText = userData.length - 1;
			totalOrder.innerText = orderData.length;
			totalSales.innerText += salesData.total_sales;
		}
	</script>
</body>

</html>