<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
	header('Location: ../index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About</title>
	<link rel="stylesheet" href="../assets/css/about.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>
	<!-- header -->
	<?php include('header.php'); ?>

	<main>
		<section class="shop">
			<h3>About us</h3>
			<div class="description">
				<p>
					At BeautyVine, we believe that true beauty is timeless an exquisite harmony of elegance, confidence,
					and
					self-expression. Inspired by nature’s grace and the art of femininity, our brand was born from a
					passion
					to create makeup that enhances, rather than conceals, your natural allure. Every shade, every
					formula,
					and every touch of BeautyVine is crafted with care, blending luxury with the purity of self-love.
					Our
					products are thoughtfully designed using high-quality, skin-loving ingredients that bring out a
					radiant
					glow while nourishing the skin beneath. We take pride in being cruelty-free and consciously crafted,
					ensuring that every detail from formulation to packaging reflects sophistication and respect for
					both
					people and the planet. At BeautyVine, makeup is more than a routine; it is a ritual of grace and
					empowerment. Whether you seek a soft, romantic glow or a bold, captivating look, our collection
					invites
					you to embrace your unique beauty with confidence and elegance. Let BeautyVine be your companion in
					every beautiful moment a brand where beauty blooms naturally, and where every woman feels radiant,
					confident, and truly divine.
				</p>
				<p>
					Our products are thoughtfully designed using high-quality, skin-loving ingredients that bring out a
					radiant glow while nourishing the skin beneath. We take pride in being cruelty-free and consciously
					crafted, ensuring that every detail from formulation to packaging reflects sophistication and
					respect
					for both people and the planet.
				</p>
				<p>
					At BeautyVine, makeup is more than a routine; it is a ritual of grace and empowerment. Whether you
					seek
					a soft, romantic glow or a bold, captivating look, our collection invites you to embrace your unique
					beauty with confidence and elegance.
				</p>
				<p>
					Let BeautyVine be your companion in every beautiful moment a brand where beauty blooms naturally,
					and
					where every woman feels radiant, confident, and truly divine.
				</p>
			</div>
		</section>

	</main>

	<!-- footer -->
	<?php include('footer.php'); ?>

</body>

</html>