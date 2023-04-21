<section class="swiper swiper_convenios max-w-screen-xl mx-auto pt-10">
  <h1 class="lg:text-5xl text-2xl text-center mb-4"><span class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-color1 to-color1">Convênios</span></h1>
  <h2 class="text-justify px-4">A ONCOCENTER é credenciada aos principais planos de saúde do Piauí! São mais de 20 empresas ligadas à clínica com o objetivo de atender melhor aos nossos pacientes. Venha nos conhecer ou entre em contato com a gente!
</h2>
  <div class="swiper-wrapper pt-4">
    <?php $stmt = $DB_con->prepare("SELECT * FROM agreements order by id desc");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    ?>
      <div class="swiper-slide bg-white rounded-lg">
        <div class="max-w-lg p-6 mx-auto rounded-xl shadow_csc">
          <a <?php if (!empty($link)){ ?>
            target="_blank" href="<?php echo $link ?>"
        <?php  } ?>
          >
            <img class="rounded-md w-full h-72 md:h-20" src="./admin/uploads/agreements/<?php echo $img; ?>">
          </a>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</section>