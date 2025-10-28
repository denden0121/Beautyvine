<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<Header>
	<div class="branding-bar">
		<img class="logo" src="../assets/images/Logo.png" alt="Logo">
		<p class="name">Beautyvine</p>
		<div class="action-btn">
			<a href="index.php"><?php echo $_SESSION['username'] ?></a>
			<p>|</p>
			<a href="../logout.php">Logout</a>
		</div>
	</div>
	<nav>
		<div class="left-placeholder"></div>
		<ul>
			<li><a href="index.php" class="<?= ($current_page == 'index.php') ? 'nav-active-btn' : '' ?>">HOME</a></li>
			<li><a href="category.php" class="<?= ($current_page == 'category.php') ? 'nav-active-btn' : '' ?>">SHOP</a></li>
			<li><a href="about.php" class="<?= ($current_page == 'about.php') ? 'nav-active-btn' : '' ?>">ABOUT US</a></li>
			<li><a href="faq.php" class="<?= ($current_page == 'faq.php') ? 'nav-active-btn' : '' ?>">CUSTOMER SUPPORT</a></li>
		</ul>
		<div class="nav-extra-btn">
			<div class="search-container">
				<input class="nav-search-input" type="text" placeholder="Search here ... ">
				<img class="nav-search-btn" src="../assets/icons/search.png" alt="Search">
			</div>
			<div>
				<a href="cart.php">
					<img src="../assets/icons/cart.png" alt="Cart">
				</a>
				<a href="ordered_product.php">
					<img src="../assets/icons/purchase_black.png" alt="Purchase">
				</a>
			</div>
		</div>
	</nav>
</Header>