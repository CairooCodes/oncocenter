<?php
session_start();
require "../db_config.php";
require "../functions/get.php";

if (!isset($_SESSION['id'])) {
  header('Location: login.php');
  exit;
}

$user_id = $_SESSION['id'] ?? null;

$sql = "SELECT name, email, img FROM users WHERE id = ?";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$categories = getCategories();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Painel Administrativo - Oncocenter</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="author" content="Cairo Felipe Developer">

  <meta property="og:title" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:description" content="" />

  <link rel="stylesheet" href="./assets/css/style.css">
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/logo.png" rel="apple-touch-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
  <script src="../assets/js/tw.js"></script>
</head>

<body>
  <?php include "components/sidebar.php" ?>
  <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <?php include "components/header.php" ?>
    <div class="max-w-7xl px-4 pb-8 mx-auto py-8">
      <div class="grid lg:grid-cols-12 lg:pt-5 gap-5">
        <div class="lg:col-span-7">
          <div class="p-5 shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between py-4 bg-white">
              <div>
                <h3 class="text-xl font-semibold text-gray-900">
                  Especialidades
                </h3>
              </div>
              <div class="flex space-x-2">
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <input type="text" id="busca" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Busca">
                </div>
              </div>
            </div>
            <p>OBS: Ao adicionar mais de uma especialidade, coloque / entre cada especialidade</p>
            <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Nome
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Ação
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $categorie) { ?>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                      <?php echo $categorie['name']; ?>
                    </td>
                    <td class="px-6 py-4">
                      <a href="./controllers/delete_categorie.php?id=<?php echo $categorie['id']; ?>" type="button" class="font-medium text-red-600 hover:underline">Excluir</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="lg:col-span-5">
          <form action="./controllers/add_categorie.php" method="post" class="relative bg-white rounded-lg shadow">
            <div class="p-6 space-y-6">
              <h3 class="text-xl font-semibold text-gray-900">
                Adicionar Especialidade
              </h3>
              <label class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
              <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nome da Especialidade" required="">
              <!-- <input type="hidden" name="type" id="type" value="Convenios"> -->
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cadastrar Especialidade</button>
          </form>
          </form>
        </div>
      </div>

    </div>
  </div>
  <script>
    const inputBusca = document.querySelector('#busca');
    inputBusca.addEventListener('input', () => {
      const termoBusca = inputBusca.value.toLowerCase();
      filtrarLinhas(termoBusca);
    });

    function filtrarLinhas(termo) {
      const tbody = document.querySelector('table tbody');
      const linhas = tbody.querySelectorAll('tr');

      linhas.forEach((linha) => {
        const textoLinha = linha.textContent.toLowerCase();
        if (textoLinha.includes(termo)) {
          linha.classList.remove('hidden');
        } else {
          linha.classList.add('hidden');
        }
      });
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>