<?php
require_once "db_config.php";
require "config/helper.php";
require "config/url.class.php";
require "./functions/get.php";

$albuns = getAlbum();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include "components/heads.php"; ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./assets/css/swiper.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</head>

<body>
  <?php include "./components/navbar.php" ?>
  <div class="mx-auto max-w-7xl px-2 pt-4">
    <div class="mb-8 mt-4 rounded-xl p-2 shadow-md shadow-blue-200">
      <div class="lg:grid sm:grid-cols-2 gap-8">

        <?php foreach ($albuns as $album) { ?>
          <div>
            <h1 class="text-center text-3xl font-extrabold leading-9 tracking-tight text-color1 sm:text-4xl sm:leading-10 md:text-left md:text-3xl md:leading-14"><?php echo $album['title']; ?></h1>
            <div style="border-radius: 20px;" class="swiper mySwiper">
              <div class="swiper-wrapper">
              <?php
                if ($album['images']) {
                  $imagens = unserialize($album['images']);
                  foreach ($imagens as $imagem) {
                    $imgs = base64_encode($imagem);
                    echo "<div class='swiper-slide'><img class='h-56 lg:h-96 w-full' src='data:image/jpeg;base64," . $imgs . "'></div>";
                  }
                }
                ?>
                <style>
                  .img-fluid {
                    height: 300px !important;
                  }
                </style>
              </div>
              <div class="flex justify-center">
                <a href="<?php echo $URI->base('/album/' . slugify($album['title'])); ?>">
                  <button class="shadow-cla-blue mt-4 mb-4 rounded-lg bg-color1 px-4 py-1 text-white drop-shadow-md hover:scale-105">
                    Veja mais
                  </button>
                </a>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <!-- <a href="<?php //echo $URI->base('/album/' . slugify($album['name'])); 
                          ?>">
              <button class="mt-4 rounded-lg bg-color1 px-4 py-1 text-white drop-shadow-md hover:scale-105">
                Leia mais
              </button>
            </a> -->

          </div>
        <?php }
        ?>
      </div>
    </div>
  </div>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
    });
  </script>
  <?php include "./components/footer.php" ?>
  <script src="./assets/js/script.js"></script>
  <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>