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
	<link rel="stylesheet" href="../assets/css/manage_user.css">
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
					<div class="search-container">
						<input class="nav-search-input" type="text" placeholder="Search here ... ">
						<img class="nav-search-btn" src="../assets/icons/search.png" alt="Search">
					</div>
					<div class="selected-container scroll">
						<table class="table">
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
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
		let cacheData;
		const getData = async () => {
			try {
				const res = await fetch('../db/get_all_user.php');
				const data = await res.json();
				cacheData = data;
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

				if (user.designation === "user") {
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
					<td>${user.status}</td>
					<td><button class="delete" onClick="acceptUser(${user.id})"><img src="../assets/icons/accept.png" alt=""></button></td>
					<td><button class="delete" onClick="declineUser(${user.id})"><img src="../assets/icons/decline.png" alt=""></button></td>
					<td><button class="delete" onClick="removeUser(${user.id})"><img src="../assets/icons/delete.png" alt=""></button></td>
					`;
					table.appendChild(tr);
				}
			});


		}
	</script>

	<script>
		const declineUser = async (userId) => {
			try {
				const res = await fetch('../db/decline_user.php', {
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

	<script>
		const acceptUser = async (userId) => {
			try {
				const res = await fetch('../db/accept_user.php', {
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

	<script>
		const removeUser = async (userId) => {
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

	<!-- search -->

	<script>
		const searchBtn = document.querySelector(".nav-search-btn");
		const find = document.querySelector(".nav-search-input");

		find.addEventListener('input', () => {
			const query = find.value.toLowerCase().trim();
			const filtered = cacheData.filter(p =>
				p.email.toLowerCase().includes(query)
			);

			console.log(filtered);
			displayFilteredData(filtered);

		});

		searchBtn.addEventListener('click', () => {
			console.log('search button clicked, searching for: ' + find.value);
		});

		// display filterd
		const displayFilteredData = (data) => {

			table.innerHTML = '';
			table.innerHTML += '';

			if (data.length > 0) {
				data.forEach(user => {
					if (user.designation === "user") {
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
						<td>${user.status}</td>
						<td><button class="delete" onClick="acceptUser(${user.id})"><img src="../assets/icons/accept.png" alt=""></button></td>
						<td><button class="delete" onClick="declineUser(${user.id})"><img src="../assets/icons/decline.png" alt=""></button></td>
						<td><button class="delete" onClick="removeUser(${user.id})"><img src="../assets/icons/delete.png" alt=""></button></td>
						`;
						table.appendChild(tr);
					}

				});
			}
		};
	</script>
</body>

</html>