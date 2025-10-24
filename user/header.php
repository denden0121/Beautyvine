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
			<li><a href="index.php">HOME</a></li>
			<!-- <li><a href="category.php">BRANDS</a></li> -->
			<li><a href="category.php">SHOP</a></li>
			<li><a href="about.php">ABOUT US</a></li>
			<li><a href="faq.php">CUSTOMER SUPPORT</a></li>
		</ul>
		<div class="nav-extra-btn">
			<div class="search-container">
				<input type="text" placeholder="Search here ... ">
				<img src="../assets/icons/search.png" alt="Search">
			</div>
			<div>
				<a href="cart.php">
					<img src="../assets/icons/cart.png" alt="Cart">
				</a>
				<a href="cart.php">
					<img src="../assets/icons/favorite.png" alt="Favorite">
				</a>
			</div>
		</div>
	</nav>
</Header>