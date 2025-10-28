<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/admin_dashboard_chart.css">
	<link rel="stylesheet" href="../assets/css/add_product.css">
</head>

<body>
	<div class="wrapper">

		<?php include('dashboard_nav.php') ?>

		<main class="main">
			<div class="welcome">
				<h1>Add Product</h1>
			</div>
			<div class="dashboard-info">
				<div class="modal">
					<form id="productForm" enctype="multipart/form-data">
						<div>
							<label class="name-label" for="name">
								Name
								<input type="text" name="name" placeholder="Product name" required>
							</label>
							<label class="tags-label" for="tags">
								Category
								<select name="tags" id="tags">
									<option value="face">Face</option>
									<option value="eyes">Eyes</option>
									<option value="cheeks">Cheeks</option>
									<option value="lips">Lips</option>
									<option value="tools">Tools & Accessories</option>
								</select>
							</label>
						</div>
						<label class="description" for="description">
							Description
							<textarea name="description" placeholder="Description" required></textarea>
						</label>
						<div>
							<label for="price">
								Price
								<input type="number" name="price" placeholder="Price" required>
							</label>
							<label for="quantity">
								Quantity
								<input type="number" name="quantity" placeholder="Quantity" required>
							</label>
							<label for="image">
								Image
								<input type="file" name="image" id="image" accept="image/*" required>
							</label>
						</div>
						<button class="add-product-btn" type="submit">Add Product</button>
					</form>
				</div>
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

	<!-- script -->
	<script>
		const form = document.getElementById('productForm');

		form.addEventListener('submit', async (e) => {
			e.preventDefault();

			const formData = new FormData(form);

			try {
				const res = await fetch('../db/upload_product.php', {
					method: 'POST',
					body: formData
				});

				const data = await res.json();
				alert(data.message);
				form.reset();
			} catch (err) {
				console.error('Upload failed:', err);
				alert('Upload failed. Check console.');
			}
		});
	</script>
</body>

</html>