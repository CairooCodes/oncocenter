<section class="swiper swiper_books max-w-screen-xl mx-auto lg:p-10 p-2">
  <h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-color1 lg:mb-8 lg:text-3xl">
    Livros</h2>
  <div class="swiper-wrapper lg:mt-6">
    <?php $stmt = $DB_con->prepare("SELECT * FROM books order by id desc");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    ?>
      <div class="swiper-slide bg-white rounded-lg">
        <div class="max-w-lg mx-auto rounded-xl shadow_csc">
          <div>
            <img class="rounded-md h-full w-full" src="./admin/uploads/books/<?php echo $img; ?>">
          </div>
          <div class="flex justify-center my-4">
            <a target="blank" href="<?php echo $link?>" class="mb-4 text-white bg-color1 focus:ring-4 rounded-md font-bold text-md px-5 py-2 text-center">Baixar</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</section>