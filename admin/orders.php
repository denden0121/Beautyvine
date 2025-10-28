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
	<link rel="stylesheet" href="../assets/css/admin_dashboard_chart.css">
	<link rel="stylesheet" href="../assets/css/manage_product.css">
</head>

<body>
	<div class="wrapper">

		<?php include('dashboard_nav.php') ?>

		<main class="main">
			<div class="welcome">
				<h1>Manage Orders</h1>
			</div>
			<div class="dashboard-info">
				<section class="shop">
					<div class="selected-container">
						<table class="table">
							<tr>
								<th>User ID</th>
								<th>Product ID</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Status</th>
								<th>Action</th>
								<th>Action</th>
							</tr>
						</table>
					</div>
				</section>
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
		const getData = async () => {
			try {
				const res = await fetch('../db/get_all_orders.php');
				const data = await res.json();
				displayData(data);
			} catch (err) {
				console.error(err);
			}
		}
		getData();

		const table = document.querySelector('.table');

		const displayData = (data) => {


			table.innerHTML += '';

			data.map(product => {
				const tr = document.createElement('tr');
				tr.innerHTML = `
				<td>${product.userId}</td>
				<td>${product.productId}</td>
				<td>x${product.quantity}</td>
				<td>₱${product.total}</td>
				<td>${product.status}</td>
				<td><button class="delete" onClick="acceptOrder(${product.id})"><img src="../assets/icons/accept.png" alt=""></button></td>
				<td><button class="delete" onClick="declineOrder(${product.id})"><img src="../assets/icons/decline.png" alt=""></button></td>
				`;
				table.appendChild(tr);
			});


		}
	</script>

	<script>
		const declineOrder = async (productId) => {
			try {
				const res = await fetch('../db/decline_order.php', {
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

	<script>
		const acceptOrder = async (productId) => {
			try {
				const res = await fetch('../db/accept_order.php', {
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