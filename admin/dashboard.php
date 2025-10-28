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
						<p>Total Orders</p>
					</div>
					<div class="overview-cards">
						<h4 class="total-sales">₱</h4>
						<p>Total Sales</p>
					</div>
				</section>
			</div>
			<div class="dashboard-banner">
				<div class="chart-container">
					<div>
						<p>Sales Overview</p>
					</div>
					<canvas id="myChart"></canvas>
				</div>
				<div class="chart-container">
					<div>
						<p>New Orders</p>
					</div>
					<table class="table" id="dashboard-table">
						<tr>
							<th>User ID</th>
							<th>Product ID</th>
							<th>Date & Time</th>
							<th>Status</th>
						</tr>
					</table>
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

				displayData(prodData, userData, orderData, salesData);
			} catch (err) {
				console.error('Fetch failed:', err);
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


	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		const ctx = document.getElementById('myChart');

		const createChart = (faceTotal, eyesTotal, cheecksTotal, lipsTotal, toolsTotal) => {
			console.log(faceTotal, eyesTotal, cheecksTotal, lipsTotal, toolsTotal)
			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Face', 'Eyes', 'Cheeks', 'Lips', 'Tools'],
					datasets: [{
						label: '# product sold per Category',
						data: [faceTotal, eyesTotal, cheecksTotal, lipsTotal, toolsTotal],
						backgroundColor: [
							'#FCA5A5',
							'#FCA5A5',
							'#FCA5A5',
							'#FCA5A5',
							'#FCA5A5'
						],
						borderColor: '#ffffff',
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					},
					plugins: {
						legend: {
							labels: {
								color: '#333',
								font: {
									size: 14
								}
							}
						}
					}
				}
			});
		}
	</script>
	<!-- chart -->
	<script>
		const getChartData = async () => {
			try {
				const chartRes = await fetch('../db/get_all_chart_data.php');
				const chartData = await chartRes.json();
				calculateChartData(chartData);
			} catch (err) {
				console.error('Fetch failed:', err);
			}
		};
		getChartData();
	</script>

	<script>
		let faceTotal = 0;
		let eyesTotal = 0;
		let cheeksTotal = 0;
		let lipsTotal = 0;
		let toolsTotal = 0;

		const calculateChartData = (chartData) => {
			console.log(chartData);
			chartData.map(data => {
				if (data.category === "face") {
					faceTotal = data.total_quantity;
				}
				if (data.category === "eyes") {
					eyesTotal = data.total_quantity;
				}
				if (data.category === "cheeks") {
					cheeksTotal = data.total_quantity;
				}
				if (data.category === "lips") {
					lipsTotal = data.total_quantity;
				}
				if (data.category === "tools") {
					toolsTotal = data.total_quantity;
				}
			});

			createChart(faceTotal, eyesTotal, cheeksTotal, lipsTotal, toolsTotal);
		};
	</script>


	<!-- orders diplay -->
	<script>
		const getOrderData = async () => {
			try {
				const res = await fetch('../db/get_all_orders.php');
				const data = await res.json();
				displayOrderData(data);
			} catch (err) {
				console.error(err);
			}
		}
		getOrderData();

		const table = document.querySelector('.table');

		const displayOrderData = (data) => {


			table.innerHTML += '';

			data.map(product => {

				const raw = product.created_at;
				const date = new Date(raw.replace(" ", "T"));
				const formatted = date.toLocaleString("en-US", {
					year: "numeric",
					month: "2-digit",
					day: "2-digit",
					hour: "numeric",
					minute: "2-digit",
					hour12: true,
				}).replace(",", "");

				const tr = document.createElement('tr');
				tr.innerHTML = `
				<td>${product.userId}</td>
				<td>${product.productId}</td>
				<td>${formatted}</td>
				<td><a style="color: rgb(255, 255, 255);background-color: #FCA5A5;padding: 2px 4px;border-radius: 8px;border: none;height: max-content;width: max-content;">${product.status}</a></td>
				`;
				table.appendChild(tr);
			});


		}
	</script>



</body>

</html>