<section class="swiper swiper_services max-w-screen-xl mx-auto" id="servicos">
  <div class="swiper-wrapper md:flex md:justify-center">
    <?php $stmt = $DB_con->prepare("SELECT * FROM services order by id desc");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    ?>
      <div class="swiper-slide bg-white rounded-lg">
        <div class="max-w-lg p-6 mx-auto rounded-xl shadow_csc">
          <div class="rounded-xl">
            <h3 class="mb-4 text-xl font-base py-2 text-center text-color1 font-extrabold"><?php echo $name; ?></h3>
          </div>
          <div>
            <img class="rounded-md h-52 w-full" src="./admin/uploads/services/<?php echo $img; ?>">
          </div>
          <div class="product_info">
            <h2 style="color:#1C1C1C !important"><?php echo $info ?></h2>
          </div>
          <div class="flex justify-center">
            <a href="<?php echo $URI->base('/topico/' . slugify($name)); ?>" class="text-white bg-color1 focus:ring-4 rounded-md font-bold text-xl px-5 py-2 text-center">Saiba mais</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
	<link rel="stylesheet" href="./assets/css/swiper.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>