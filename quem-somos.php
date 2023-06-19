<?php
require "db_config.php";
require "config/helper.php";
require "config/url.class.php";

require "./functions/get.php";

$abouts = getAbout();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "components/heads.php"; ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
	<link rel="stylesheet" href="./assets/css/swiper.css">
</head>


<body>
	<?php include "components/navbar.php"; ?>
	<div class="mx-auto max-w-6xl pt-2 about">
		<div class="lg:pt-4 lg:p-0 lg:p-10 p-5">
			<?php foreach ($abouts as $about) {
				echo $about['maintext'];
			} ?>
		</div>
		<?php include "components/services_in_about.php"; ?>
	</div>
	<?php include "components/footer.php"; ?>
	<script>
		var swiper = new Swiper(".swiper_services", {
			autoplay: {
				delay: 2000,
			},
			freeMode: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			breakpoints: {
				300: {
					slidesPerView: 1.1,
					spaceBetween: 20,
				},
				640: {
					slidesPerView: 2,
					spaceBetween: 30,
				},
				768: {
					slidesPerView: 3,
					spaceBetween: 30,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 30,
				},
			},
		});
	</script>
</body>

</html>