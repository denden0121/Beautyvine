<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
	<link rel="stylesheet" href="../assets/css/add_product.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<Header>
		<div class="branding-bar">
			<img class="logo" src="../assets/images/Logo.png" alt="Logo">
			<p class="name">Beautyvine</p>
			<div class="action-btn">
				<a href="#">LOGIN</a>
				<p>|</p>
				<a href="#">REGISTER</a>
			</div>
		</div>
		<nav>
			<div class="left-placeholder"></div>
			<div class="left-placeholder"></div>
			<ul>
				<li><a href="#">Manage Product</a></li>
				<li><a href="#">Manage User</a></li>
			</ul>
			<div class="right-placeholder"></div>
			<div class="right-placeholder"></div>
		</nav>
	</Header>


	<main>
		<section>

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
						<textarea name="description" placeholder="Description"></textarea>
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

		</section>

	</main>

	<!-- footer -->
	<Footer>
		<div class="logo-container">
			<img class="logo" src="../assets/images/Logo.png" alt="Logo">
			<p class="name">Beautyvine</p>
		</div>
		<ul>
			<li><a href="#">HOME</a></li>
			<li><a href="#">BRANDS</a></li>
			<li><a href="#">SHOP</a></li>
			<li><a href="#">ABOUT US</a></li>
			<li><a href="#">CUSTOMER SUPPORT</a></li>
		</ul>
		<div class="socials">
			<a href="#"><img src="../assets/icons/facebook.png" alt="Facebook"></a>
			<a href="#"><img src="../assets/icons/instagram.png" alt="Instagram"></a>
			<a href="#"><img src="../assets/icons/email.png" alt="email"></a>
		</div>
		<p>@2025 Beautyvine Philippines . All Right Reserved.Store Specialist . Inc</p>
	</Footer>

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

				const data = await res.text();
				alert(data);
				form.reset();
			} catch (err) {
				console.error('Upload failed:', err);
				alert('Upload failed. Check console.');
			}
		});
	</script>

</body>

</html>