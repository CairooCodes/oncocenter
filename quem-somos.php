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
  <div class="mx-auto max-w-6xl pt-2 about">
    <div class="lg:pt-4 lg:p-0 lg:p-10 p-5">
      <h2 class="my-4 text-justify">
	  O Centro Avançado de Radioncologia - Oncocenter atende pessoas para prevenção, diagnóstico e tratamento do câncer e outras doenças. Situada no bairro Jóquei Clube em Teresina - PI, oferece especialidades como: oncologia clínica e cirúrgica, aconselhamento genético em oncologia, radioterapia, mastologia, ginecologia, geriatria oncológica, infectologia, cirurgia vascular, cirurgia plástica, cirurgia torácica, nutrição oncológica, dentre outras.
      </h2>
      <h2 class="text-justify">
	  Possui boxes individualizados de quimioterapia para maior conforto e privacidade, além de tratamento de radioterapia seguro e adequados às necessidades de nossos pacientes. Possui ainda setor de diagnóstico com toda a credibilidade da UDI e Laboratório Exame e oferece também psicoterapia, fisioterapia e outras terapias integrativas que tornam o tratamento oncológico mais humanizado. Por isso somos um Centro Avançado de RadioOncologia reconhecido pela excelência no Norte-Nordeste do Brasil, com atuação ética e responsabilidade socioambiental.
      </h2>
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