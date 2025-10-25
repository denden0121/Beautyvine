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
	<title>Users</title>
	<link rel="stylesheet" href="../assets/css/manage_user.css">
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
						<th>Username</th>
						<th>Email</th>
						<th>Created</th>
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
				const res = await fetch('../db/get_all_user.php');
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

			data.map(user => {
				const tr = document.createElement('tr');
				tr.innerHTML = `
				<td>${user.username}</td>
				<td>${user.email}</td>
				<td>
					${
						new Date(user.created_at).toLocaleString('en-PH', {
							year: 'numeric',
							month: 'short',
							day: 'numeric',
							hour: '2-digit',
							minute: '2-digit',
							hour12: true
						})
					}
				</td>
				<td><button class="delete" onClick="removeProduct(${user.id})">Delete</button></td>
				`;
				table.appendChild(tr);
			});


		}
	</script>

	<script>
		const removeProduct = async (userId) => {
			console.log(userId)

			try {
				const res = await fetch('../db/remove_user.php', {
					method: 'POST',
					body: JSON.stringify({
						userId
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