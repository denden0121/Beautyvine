<?php
$current_page = basename($_SERVER['PHP_SELF']); // gets current file name, e.g. "landing_about.php"
?>
<Header>
	<div class="branding-bar">
		<img class="logo" src="../assets/images/Logo.png" alt="Logo">
		<p class="name">Beautyvine</p>
		<div class="action-btn">
			<a href="../login.php">LOGIN</a>
			<p>|</p>
			<a href="../register.php">REGISTER</a>
		</div>
	</div>
	<nav>
		<div class="left-placeholder"></div>
		<ul>
			<li><a href="../index.php" class="<?= ($current_page == 'index.php') ? 'nav-active-btn' : '' ?>">HOME</a></li>
			<li><a href="landing_category.php" class="<?= ($current_page == 'landing_category.php') ? 'nav-active-btn' : '' ?>">SHOP</a></li>
			<li><a href="landing_about.php" class="<?= ($current_page == 'landing_about.php') ? 'nav-active-btn' : '' ?>">ABOUT US</a></li>
			<li><a href="landing_faq.php" class="<?= ($current_page == 'landing_faq.php') ? 'nav-active-btn' : '' ?>">CUSTOMER SUPPORT</a></li>
		</ul>
		<div class="nav-extra-btn">
			<div class="search-container">
				<input class="nav-search-input" type="text" placeholder="Search here ... ">
				<img src="../assets/icons/search.png" alt="Search">
			</div>
			<div>
				<a href="../login.php">
					<img src="../assets/icons/cart.png" alt="Cart">
				</a>
				<a href="../login.php">
					<img src="../assets/icons/purchase_black.png" alt="Purchase">
				</a>
			</div>
		</div>
	</nav>
</Header>