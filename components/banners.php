<section class="swiper swiper_banners">
  <div class="swiper-wrapper">
    <?php
    $stmt = $DB_con->prepare("SELECT * FROM banners");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    ?>
      <div class="swiper-slide">
        <img class="hidden lg:block" src="<?php echo $URI->base("/admin/uploads/banners/$img"); ?>" />
        <img class="lg:hidden block" src="<?php echo $URI->base("/admin/uploads/banners/$img2"); ?>" />
        <?php if ($type == 2) { ?>
          <div class="swiper_banners_text">
            <h1 class="max-w-2xl mb-4 text-3xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
              <?php echo $title; ?></h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-md md:text-lg lg:text-xl dark:text-gray-400"><?php echo $subtitle; ?>
            </p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
              <a href="<?php echo $btn_link; ?>" class="inline-flex items-center justify-center w-full px-5 py-3 mb-2 mr-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:w-auto focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                <?php echo $btn_name; ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-1 bi bi-whatsapp" viewBox="0 0 16 16">
                  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                </svg>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php
    }
    ?>
  </div>
  <div class="swiper-pagination"></div>
</section>