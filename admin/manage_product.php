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
	<title>Product</title>
	<link rel="stylesheet" href="../assets/css/manage_product.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>

	<!-- header -->
	<?php include('header.php'); ?>

	<main>
		<section class="shop">
			<div class="selected-container">
				<table class="table">
					<tr>
						<th>Product</th>
						<th>Description</th>
						<th>Category</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Delete</th>
					</tr>
				</table>
			</div>
		</section>
	</main>


	<!-- footer -->
	<?php include('footer.php'); ?>

	<script>
		const getData = async () => {
			try {
				const res = await fetch('../db/get_all_products.php');
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
				<td>${product.name}</td>
				<td>${product.description}</td>
				<td>${product.tags}</td>
				<td>₱${product.price}</td>
				<td>x${product.quantity}</td>
				<td><button class="delete" onClick="removeProduct(${product.id})">Delete</button></td>
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