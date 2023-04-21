<section class="swiper swiper_services max-w-screen-xl mx-auto pt-10" id="servicos">
  <h1 class="lg:text-5xl text-2xl text-center mb-4"><span class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-color1 to-color1">Serviços</span></h1>
  <div class="mx-auto max-w-6xl p-5">
    <h2 class="text-justify">A ONCOCENTER está sempre pronta para atender com total conforto e agilidade! Oferecemos atendimento especializado em várias especialidades médicas, sendo nosso diferencial o atendimento em Radioterapia e Quimioterapia, além de contarmos com equipe multidisciplinar nas áreas de: Psicologia, Fisioterapia, Nutrição e muito mais!
    </h2>
  </div>
  <div class="swiper-wrapper md:flex md:justify-center">
    <?php $stmt = $DB_con->prepare("SELECT * FROM services order by id desc");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    ?>
      <div class="swiper-slide bg-white rounded-lg">
        <div class="max-w-lg p-6 mx-auto rounded-xl shadow_csc">
          <div class="rounded-xl">
            <h3 class="mb-4 text-xl font-base py-2 text-center text-color1"><?php echo $name; ?></h3>
          </div>
          <div>
            <img class="rounded-md h-52 w-full" src="./admin/uploads/services/<?php echo $img; ?>">
          </div>
          <div class="product_info">
            <h2 style="color:#1C1C1C !important"><?php echo $info ?></h2>
          </div>
          <div class="flex justify-center">
            <a href="<?php echo $URI->base('/servico/' . slugify($name)); ?>" class="text-white bg-color1 focus:ring-4 rounded-md font-bold text-xl px-5 py-2 text-center">Saiba mais</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</section>