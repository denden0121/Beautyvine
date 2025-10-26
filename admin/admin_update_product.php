<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('Location: ../index.php');
	exit;
}
$id = $_GET['id'];
if (!isset($_GET['id'])) {
	header('Location: admin_manage_product.php');
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
	<link rel="stylesheet" href="../assets/css/update_product.css">
</head>

<body>
	<div class="wrapper">

		<?php include('dashboard_nav.php') ?>

		<main class="main">
			<div class="welcome">
				<h1>Add Product</h1>
			</div>
			<div class="dashboard-info-row">
				<div class="modal">
					<div class="note">
						<h3>Full Control: access product data!</h3>
					</div>
					<form id="productForm" enctype="multipart/form-data">
						<div>
							<label class="name-label" for="name">
								Name
								<input class="name-text" type="text" name="name" placeholder="Product name" required>
							</label>
							<label class="tags-label" for="tags">
								Category
								<select class="tags" name="tags" id="tags">
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
							<textarea class="description-text" name="description" placeholder="Description" required></textarea>
						</label>
						<div>
							<label for="price">
								Price
								<input class="price" type="number" name="price" placeholder="Price" required>
							</label>
							<label for="quantity">
								Quantity
								<input class="quantity" type="number" name="quantity" placeholder="Quantity" required>
							</label>
							<label for="image">
								Image
								<input class="img_url" type="file" name="image" id="image" accept="image/*" required>
							</label>
						</div>
						<button class="add-product-btn" type="submit">Full Update</button>
					</form>
				</div>

				<div class="modal-small">
					<div class="note">
						<h3>Simple Control: access price & quantity only!</h3>
					</div>
					<form id="simpleForm" enctype="multipart/form-data">
						<div>
							<label for="price">
								Price
								<input class="price" type="number" name="price" placeholder="Price" required>
							</label>
							<label for="quantity">
								Quantity
								<input class="quantity" type="number" name="quantity" placeholder="Quantity" required>
							</label>
						</div>
						<button class="add-product-btn" type="submit">Update</button>
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

	<script>
		const fullForm = document.getElementById('productForm');
		const productId = "<?php echo htmlspecialchars($id); ?>";

		fullForm.addEventListener('submit', async (e) => {
			e.preventDefault();
			const formData = new FormData(fullForm);
			formData.append('id', productId);
			formData.append('type', 'full');

			try {
				const res = await fetch('../db/update_product.php', {
					method: 'POST',
					body: formData
				});
				const data = await res.json();
				alert(data.message);
				fullForm.reset();
				location.reload();
			} catch (err) {
				console.error('Full update failed:', err);
				alert('Full update failed. Check console.');
			}
		});

		const simpleForm = document.getElementById('simpleForm');

		simpleForm.addEventListener('submit', async (e) => {
			e.preventDefault();
			const formData = new FormData(simpleForm);
			formData.append('id', productId);
			formData.append('type', 'simple');

			try {
				const res = await fetch('../db/update_product.php', {
					method: 'POST',
					body: formData
				});
				const data = await res.json();
				alert(data.message);
				simpleForm.reset();
				location.reload();
			} catch (err) {
				console.error('Simple update failed:', err);
				alert('Simple update failed. Check console.');
			}
		});
	</script>

	<script>
		const getProductData = async () => {

			try {
				const res = await fetch('../db/get_product_data.php', {
					method: 'POST',
					body: JSON.stringify({
						productId
					})
				})
				const data = await res.json();
				console.log(data)
				populateData(data);
			} catch (err) {
				console.error(err);
			}

		}

		getProductData()
	</script>

	<script>
		const nameInput = document.querySelector('.name-text');
		const tagsSelect = document.querySelector('.tags');
		const descriptionInput = document.querySelector('.description-text');
		const priceInput = document.querySelector('.price');
		const quantityInput = document.querySelector('.quantity');
		const imageInput = document.querySelector('.img_url');

		const populateData = (data) => {
			data.forEach(product => {
				nameInput.value = product.name;
				tagsSelect.value = product.tags;
				descriptionInput.value = product.description;
				priceInput.value = product.price;
				quantityInput.value = product.quantity;
			});
		};
	</script>

</body>

</html>