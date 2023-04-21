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
    <div class="lg:pt-4 lg:p-0 mt-6 lg:p-10 p-5">
      <h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-color1 lg:mb-8 lg:text-3xl">
        NOSSAS POLÍTICAS DE PRIVACIDADE</h2>
      <div class="max-w-screen-md mx-auto bg-white px-12 py-3 rounded-lg">
        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white" data-inactive-classes="text-gray-500">
          <h3 id="accordion-flush-heading-1">
            <button type="button" class="flex items-center justify-between w-full py-5 font-bold text-left text-color1 border-b border-gray-200" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
              <span>Política de privacidade do site</span>
              <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </h3>
          <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
            <div class="py-5 border-b border-gray-200">
              <p class="mb-2 text-gray-500">Esta política de privacidade abrange o tratamento, pela OncoCenter dos dados
                (informações) que sejam capazes de identificar os usuários, coletadas quando
                estes estão no site da OncoCenter na internet ou que venham acompor bases
                de dados eletrônicos da empresa.</p>
              <div class="py-5 border-b border-gray-200">
                <a target="blank" href="<?php echo $URI->base("/assets/docs/Pollítica_de_Privacidade_do_Site.pdf"); ?>" class="text-color1 hover:underline">Leia a política aqui</a>
              </div>
            </div>
          </div>
          <h3 id="accordion-flush-heading-2">
            <button type="button" class="flex items-center justify-between w-full py-5 font-bold text-left text-color1 border-b border-gray-200" data-accordion-target="#accordion-flush-body-2" aria-expanded="true" aria-controls="accordion-flush-body-2">
              <span>Política de cookies</span>
              <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </h3>
          <div id="accordion-flush-body-2" class="" aria-labelledby="accordion-flush-heading-2">
            <div class="py-5 border-b border-gray-200">
              <div class="py-5 border-b border-gray-200">
                <a target="blank" href="<?php echo $URI->base("/assets/docs/Política_de_Cookies.pdf"); ?>" class="text-color1 hover:underline">Leia a política aqui</a>
              </div>
            </div>
          </div>
          <h3 id="accordion-flush-heading-3">
            <button type="button" class="flex items-center justify-between w-full py-5 font-bold text-left text-color1 border-b border-gray-200" data-accordion-target="#accordion-flush-body-3" aria-expanded="true" aria-controls="accordion-flush-body-3">
              <span>Política de tratamento da informação</span>
              <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </h3>
          <div id="accordion-flush-body-3" class="" aria-labelledby="accordion-flush-heading-3">
            <div class="py-5 border-b border-gray-200">
              <div class="py-5 border-b border-gray-200">
                <a target="blank" href="<?php echo $URI->base("/assets/docs/Política_de_Tratamento_da_Informação.pdf"); ?>" class="text-color1 hover:underline">Leia a política aqui</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-color1 lg:mb-8 lg:text-3xl">
      Ficou com dúvidas? </h2>
    <div class="max-w-screen-md mx-auto bg-white px-12 py-3 rounded-lg">
      <p class="">Entre em contato com nosso encarregado de dados Silvana Moreira por e-mail : encarregado@oncocenterpiaui.com.br ou por telefone (86) 2106-8700.</p>
    </div>
  </div>
  <?php include "components/footer.php"; ?>

</body>

</html>