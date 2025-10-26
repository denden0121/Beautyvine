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
	<title>Frequently asked questions</title>
	<link rel="stylesheet" href="../assets/css/faq.css">
	<link rel="stylesheet" href="../assets/css/footer-header.css">
</head>

<body>

	<!-- header -->
	<?php include('landing_header.php'); ?>

	<main>
		<section class="shop">

			<h3>💋 Frequently Asked Questions (FAQs)</h3>

			<div class="orders">
				<h4>Orders</h4>
				<details name="my-accordion">
					<summary> How do I place an order?</summary>
					<p>Just browse our makeup collection, choose your favorite products, and click “Add to Cart.” Once
						done, go to Checkout, fill in your details, and confirm your payment.
					</p>
				</details>
				<details name="my-accordion">
					<summary>Can I cancel or change my order?</summary>
					<p>Yes, you can request a change or cancellation within 1 hour after placing your order by
						contacting our Customer Support.</p>
				</details>
				<details name="my-accordion">
					<summary>How can I track my order?</summary>
					<p>Once your order ships, you’ll receive a tracking number via email or SMS. You can use it on our
						“Track My Order” page to check delivery updates.</p>
				</details>
				<details name="my-accordion">
					<summary>What payment methods do you accept?</summary>
					<p>Please contact us within 3 days of receiving your package. Send us a photo of the item, and we’ll
						arrange a replacement or refund right away.</p>
				</details>
				<details name="my-accordion">
					<summary> What should I do if I receive a wrong or damaged product? </summary>
					<p>Please contact us within 3 days of receiving your package. Send us a photo of the item, and we’ll
						arrange a replacement or refund right away.</p>
				</details>
			</div>

			<div class="orders">
				<h4>Makeup</h4>
				<details name="my-accordion">
					<summary>What is the best way to choose the right foundation shade?</summary>
					<p>Choose a foundation that matches your skin tone and undertone. Test it on your jawline or neck
						area in natural light to see if it blends seamlessly. Many brands also offer shade guides
						online.
					</p>
				</details>
				<details name="my-accordion">
					<summary> How long does makeup usually last during the day? </summary>
					<p>Most makeup lasts 6–8 hours, depending on your skin type and products used. To make it last
						longer, apply primer before and setting spray after your makeup routine.</p>
				</details>
				<details name="my-accordion">
					<summary> Is it okay to wear makeup every day?</summary>
					<p>Yes! As long as you remove your makeup properly and follow a good skincare routine. Always
						cleanse, tone, and moisturize your skin after wearing makeup.</p>
				</details>
				<details name="my-accordion">
					<summary> What makeup products are essential for beginners?</summary>
					<p>Start with the basics: foundation or BB cream, concealer, eyebrow pencil, mascara, blush, and lip
						tint or lipstick. Once you’re comfortable, you can experiment with eyeshadows and contouring.
					</p>
				</details>
				<details name="my-accordion">
					<summary> How should I clean my makeup brushes?</summary>
					<p>Wash them weekly using a gentle brush cleanser or mild shampoo. Rinse well, squeeze out excess
						water, and let them dry flat to prevent damage.</p>
				</details>
			</div>

		</section>

	</main>

	<!-- footer -->
	<?php include('landing_footer.php'); ?>

	<script>
		let initialQuantity = 1;

		const incBtn = document.querySelector('.increase');
		const decBtn = document.querySelector('.decrease');
		const quantity = document.querySelector('.quantity');

		// Set initial quantity
		quantity.innerText = initialQuantity;

		// Increase button
		incBtn.addEventListener('click', () => {
			let current = parseInt(quantity.innerText);
			quantity.innerText = current + 1;
		});

		// Decrease button
		decBtn.addEventListener('click', () => {
			let current = parseInt(quantity.innerText);
			if (current > 1) quantity.innerText = current - 1;
		})
	</script>
</body>

</html>