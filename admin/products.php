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
				<h1>Manage Products</h1>
				<a class="add-product-btn" href="admin_add_product.php"><img class="add-btn" src="../assets/icons/add.png" alt="">Add Product</a>
			</div>
			<div class="dashboard-info">
				<section class="shop">
					<div class="selected-container">
						<table class="table">
							<tr>
								<th>Product</th>
								<th>Name</th>
								<th>Description</th>
								<th>Category</th>
								<th>Price</th>
								<th>Quantity</th>
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
				const res = await fetch('../db/get_all_products.php');
				const data = await res.json();
				displayData(data);
				console.log(data);
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
				<td><img class="product-img" src="../db/${product.img_url}" alt="${product.name}"></td>
				<td>${product.name}</td>
				<td>${product.description}</td>
				<td>${product.tags}</td>
				<td>₱${product.price}</td>
				<td>x${product.quantity}</td>
				<td><a class="update" href="admin_update_product.php?id=${product.id}"><img src="../assets/icons/update.png" alt=""></td>
				<td><button class="delete" onClick="removeProduct(${product.id})"><img src="../assets/icons/delete.png" alt=""></button></td>
				`;
				table.appendChild(tr);
			});


		}
	</script>

	<script>
		const removeProduct = async (productId) => {

			try {
				const res = await fetch('../db/remove_product.php', {
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