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
	<link rel="stylesheet" href="./assets/css/swiper.css">
</head>


<body>
	<?php include "components/navbar.php"; ?>
	<?php include "components/banners.php"; ?>
	<?php include "components/about.php"; ?>
	<?php include "components/services.php"; ?>
	<?php include "components/agreements.php"; ?>
	<?php include "components/infos_books.php"; ?>
	<?php
	$stmt = $DB_con->prepare("SELECT * FROM posts");
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		include "components/blog.php";
	}
	?>
	<?php include "components/footer.php"; ?>

	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".swiper_banners", {
			slidesPerView: 1,
			centeredSlides: true,
			freeMode: true,
		});
	</script>
	<script>
		var swiper = new Swiper(".swiper_blog", {
			centeredSlides: true,
			loop: true,
			breakpoints: {
				300: {
					slidesPerView: 1.1,
					spaceBetween: 1,
				},
				640: {
					slidesPerView: 2,
					spaceBetween: 5,
				},
				768: {
					slidesPerView: 3,
					spaceBetween: 5,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 5,
				},
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	</script>
	<script>
		var swiper = new Swiper(".swiper_services", {
			loop: true,
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
	<script>
		var swiper = new Swiper(".swiper_convenios", {
			autoplay: {
				delay: 2000,
			},
			centeredSlides: true,
			freeMode: true,
			loop: true,
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
					slidesPerView: 8,
					spaceBetween: 30,
				},
			},
		});
	</script>
	<script>
		var swiper = new Swiper(".swiper_books", {
			centeredSlides: true,
			autoplay: {
				delay: 2000,
			},
			freeMode: true,
			loop: true,
			breakpoints: {
				300: {
					slidesPerView: 1.4,
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
					spaceBetween: 10,
				},
			},
		});
	</script>
</body>

</html>