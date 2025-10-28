<?php
$current_page = basename($_SERVER['PHP_SELF']); // e.g. "products.php"
?>
<nav class="nav">
	<button class="nav-toggle-btn" onclick="navToggle()"><img src="../assets/icons/menu.png" alt=""></button>
	<ul>
		<li>
			<a href="dashboard.php" class="<?= ($current_page == 'dashboard.php') ? 'admin-nav-active-btn' : '' ?>">
				<img src="../assets/icons/dashboard.png" alt="">Dashboard
			</a>
		</li>
		<li>
			<a href="products.php" class="<?= ($current_page == 'products.php') ? 'admin-nav-active-btn' : '' ?>">
				<img src="../assets/icons/products.png" alt="">Products
			</a>
		</li>
		<li>
			<a href="orders.php" class="<?= ($current_page == 'orders.php') ? 'admin-nav-active-btn' : '' ?>">
				<img src="../assets/icons/orders.png" alt="">Orders
			</a>
		</li>
		<li>
			<a href="users.php" class="<?= ($current_page == 'users.php') ? 'admin-nav-active-btn' : '' ?>">
				<img src="../assets/icons/customer.png" alt="">Customers
			</a>
		</li>
		<li>
			<a href="../logout.php">
				<img src="../assets/icons/logout.png" alt="">Logout
			</a>
		</li>
	</ul>
</nav>