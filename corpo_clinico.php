<?php
require "db_config.php";
require "config/helper.php";
require "config/url.class.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "components/heads.php"; ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
	<link rel="stylesheet" href="<?php echo $URI->base("/assets/css/swiper.css") ?>">
</head>

<body>
	<?php include "components/navbar.php"; ?>
	<div class="lg:pt-4 lg:p-0">
		<?php include "components/doctors.php"; ?>
	</div>
	</div>
	<?php include "components/footer.php"; ?>

	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".swiper_services", {
			freeMode: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			breakpoints: {
				300: {
					slidesPerView: 1.3,
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