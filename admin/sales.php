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
				<h1>Sales Records</h1>
			</div>
			<div class="dashboard-info">
				<section class="shop">
					<div class="chart-container-line">
						<canvas id="myLineChart"></canvas>
						<div>
							<p class="sales-orders overview-cards">Total Orders: x</p>
							<p class="sales-total overview-cards">Total Sales: ₱</p>
						</div>
					</div>
					<div class="selected-container scroll">
						<table class="table">
							<tr>
								<th>User ID</th>
								<th>Product ID</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>Time & Date</th>
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
		const table = document.querySelector('.table');
		const salesTotalData = document.querySelector('.sales-total');
		const salesOrderData = document.querySelector('.sales-orders');

		const displayData = (data, totalSalesRecordData) => {
			salesTotalData.innerText += totalSalesRecordData.total_sales;
			salesOrderData.innerText += totalSalesRecordData.total_quantity;

			table.innerHTML += '';

			data.map(product => {
				const tr = document.createElement('tr');
				tr.innerHTML = `
				<td>${product.userId}</td>
				<td>${product.productId}</td>
				<td>x${product.productQuantity}</td>
				<td>₱${product.productTotal}</td>
				<td>${product.created_at}</td>
				`;
				table.appendChild(tr);
			});


		}
	</script>

	<!-- chart -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		const createChart = (
			januaryTotal,
			februaryTotal,
			marchTotal,
			aprilTotal,
			mayTotal,
			juneTotal,
			julyTotal,
			augustTotal,
			septemberTotal,
			octoberTotal,
			novemberTotal,
			decemberTotal
		) => {
			const ctx = document.getElementById('myLineChart').getContext('2d');

			const myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // X-axis labels
					datasets: [{
						label: 'Monthly Sales',
						data: [
							januaryTotal,
							februaryTotal,
							marchTotal,
							aprilTotal,
							mayTotal,
							juneTotal,
							julyTotal,
							augustTotal,
							septemberTotal,
							octoberTotal,
							novemberTotal,
							decemberTotal
						], // Data points
						borderColor: 'rgba(75, 192, 192, 1)',
						backgroundColor: 'rgba(75, 192, 192, 0.2)',
						borderWidth: 2,
						fill: true,
						tension: 0.3 // smooth curve
					}]
				},
				options: {
					responsive: true,
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		}
	</script>

	<script>
		let januaryTotal = 0;
		let februaryTotal = 0;
		let marchTotal = 0;
		let aprilTotal = 0;
		let mayTotal = 0;
		let juneTotal = 0;
		let julyTotal = 0;
		let augustTotal = 0;
		let septemberTotal = 0;
		let octoberTotal = 0;
		let novemberTotal = 0;
		let decemberTotal = 0;

		const manageData = (data) => {

			data.map(product => {
				const created_at = product.created_at;
				const date = new Date(created_at);

				const month = date.getMonth();

				if (month === 0) {
					januaryTotal += Number(product.productTotal);
				} else if (month === 1) {
					februaryTotal += Number(product.productTotal);
				} else if (month === 2) {
					marchTotal += Number(product.productTotal);
				} else if (month === 3) {
					aprilTotal += Number(product.productTotal);
				} else if (month === 4) {
					mayTotal += Number(product.productTotal);
				} else if (month === 5) {
					juneTotal += Number(product.productTotal);
				} else if (month === 6) {
					julyTotal += Number(product.productTotal);
				} else if (month === 7) {
					augustTotal += Number(product.productTotal);
				} else if (month === 8) {
					septemberTotal += Number(product.productTotal);
				} else if (month === 9) {
					octoberTotal += Number(product.productTotal);
				} else if (month === 10) {
					novemberTotal += Number(product.productTotal);
				} else if (month === 11) {
					decemberTotal += Number(product.productTotal);
				}


			})

			createChart(
				januaryTotal,
				februaryTotal,
				marchTotal,
				aprilTotal,
				mayTotal,
				juneTotal,
				julyTotal,
				augustTotal,
				septemberTotal,
				octoberTotal,
				novemberTotal,
				decemberTotal
			);
		}
	</script>

	<script>
		const getData = async () => {
			try {
				const res = await fetch('../db/get_all_sales_record.php');
				const totalSalesRecordRes = await fetch('../db/get_all_sales.php');
				const data = await res.json();
				const totalSalesRecordData = await totalSalesRecordRes.json();
				console.log(data);
				console.log(totalSalesRecordData);
				displayData(data, totalSalesRecordData);
				manageData(data);
			} catch (err) {
				console.error(err);
			}
		}
		getData();
	</script>

</body>

</html>