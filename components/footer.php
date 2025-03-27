<footer class="bg-color1 mt-10">
  <div class="max-w-6xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4">
      <div>
        <div class="justify-center flex">
          <img src="<?php echo $URI->base('/assets/img/logo_white.png') ?>">
        </div>
      </div>
      <div>
        <h3 class="mb-6 text-sm font-semibold text-white uppercase">
          www.oncocenterpiaui.com.br
        </h3>
        <ul class="text-white">
          <li class="mb-4">
            <a href="<?php echo $URI->base("#servicos"); ?>" class="hover:underline">Serviços</a>
          </li>
          <li class="mb-4">
            <a href="<?php echo $URI->base("quem-somos"); ?>" class="hover:underline">Quem Somos</a>
          </li>
          <li class="mb-4">
            <a href="<?php echo $URI->base("servico/radioterapia"); ?>" class="hover:underline">Radioterapia</a>
          </li>
          <li class="mb-4">
            <a href="<?php echo $URI->base("servico/quimioterapia"); ?>" class="hover:underline">Quimioterapia</a>
          </li>
          <li class="mb-4">
            <a href="<?php echo $URI->base('politica-de-privacidade') ?>" class="hover:underline">Políticas de Privacidade</a>
          </li>
          <li class="mb-4">
            <a href="<?php echo $URI->base('admin/login.php') ?>" class="hover:underline">Login</a>
          </li>
        </ul>
      </div>
      <div>
        <h3 class="mb-6 text-sm font-semibold text-white uppercase">Contato</h3>
        <p class="text-white">
          Telefone: (86) 2106-8700
          Endereço: R. Anfrísio Lobão, 853 - Jóquei, Teresina - PI, 64049-280
          E-mail: administracao@oncocenterpiaui.com.br
        </p>
      </div>
      <div>
        <a href="https://api.whatsapp.com/send?phone=558621068704&text=Ol%25C3%25A1%21%2520Bem%2520vind%40%2520%25C3%25A0%2520Oncocenter%2520Piau%25C3%25AD.%2520%25F0%259F%2598%2584%25E2%259C%25A8">
          <i class="bi bi-whatsapp"></i>
        </a>
        <a href="https://www.instagram.com/oncocenterpi/">
          <i class="bi bi-instagram"></i>
        </a>
        <a href="https://www.facebook.com/oncocenterpiaui/">
          <i class="bi bi-facebook"></i>
        </a>
      </div>
    </div>
    <div class="text-center pt-10">
      <span class="block text-base text-center text-white">© 2023 - Oncocenter Piauí
      </span>
      <span class="block text-xs text-center text-white">Centro Avançado de Radioncologia
      </span>
      <div class="pt-10">
        <span class="block text-xs text-center text-white">Site criado por
        </span>
        <span class="block text-xs text-center text-white">Web Developer Full Stack: @cairofelipedev
        </span>
      </div>
    </div>
  </div>
</footer>

<script src="<?php echo $URI->base('/assets/js/dark_mode.js') ?>"></script>
<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>