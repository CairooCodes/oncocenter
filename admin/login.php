<?php
session_start();
require '../db_config.php';
require_once 'config/conexao.php';
require_once 'config/logar.php';
include 'config/logs/login.php';

if (isset($_POST['ok'])) :
  $login = filter_input(INPUT_POST, "login");
  $password = filter_input(INPUT_POST, "password");
  $_1 = new Login;
  $_1->setLogin($login);
  $_1->setPassword($password);

  if ($_1->logar()) :
    $successMSG = "Entrando";
  else :
    $errMSG = "Usuário ou senha inválidos ...";
  endif;
endif;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include "components/heads.php" ?>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            color1: '#206672',
            color2: '',
            color3: '',
          }
        }
      }
    }
  </script>
</head>

<body>
  <div class="absolute top-0 left-0 bottom-0 leading-5 h-full w-full overflow-hidden">
  </div>
  <div class="pt-10 md:pt-0 md:px-0 px-4 relative min-h-screen sm:flex sm:flex-row justify-center bg-transparent rounded-3xl">
    <div class="flex-col flex self-center lg:px-14 sm:max-w-4xl xl:max-w-md z-10">
      <div class="lg:flex flex-col">
        <img src="../assets/img/logo.png" class="w-52">
        <p class="pr-3 pt-4 text-md opacity-75">Bem vindo ao sistema administrativo do site</p>
      </div>
    </div>
    <div class="flex justify-center self-center z-10 shadow-2xl">
      <div class="p-12 bg-white mx-auto rounded-2xl w-96 ">
        <div class="mb-7">
          <h3 class="font-semibold text-2xl text-gray-800">Entrar </h3>
          <!-- <p class="text-gray-400">Don'thave an account? <a href="#" class="text-sm text-purple-700 hover:text-purple-700">Sign Up</a></p> -->
        </div>
        <form action="" method="POST">
          <div class="space-y-6">
            <div class="">
              <input name="login" class="w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-color1" type="" placeholder="Email">
            </div>
            <div class="relative" x-data="{ show: true }">
              <input name="password" placeholder="Senha" :type="show ? 'password' : 'text'" class="w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-color1">
              <div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">

                <svg @click="show = !show" :class="{'hidden': !show, 'block':show }" class="h-4 text-color1" fill="none" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                  <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                  </path>
                </svg>

                <svg @click="show = !show" :class="{'block': !show, 'hidden':show }" class="h-4 text-color1" fill="none" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                  <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                  </path>
                </svg>

              </div>
            </div>
            <div>
              <button type="submit" name="ok" class="w-full flex justify-center bg-color1 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
                Entrar
              </button>
            </div>
          </div>
        </form>
        <?php
        if (isset($successMSG)) {
          if (isset($_SESSION['logado'])) :
          else :
            header("Location: login.php");
          endif;
        ?>
          <form action="" method="POST">
            <input type="hidden" class="form-control" type="text" name="name" value="<?php echo $_SESSION['name']; ?>" />
            <input type="hidden" class="form-control" type="text" name="type" value="login" />
            <button id="clickButton" type="submit" name="submit" style="background-color:transparent;"></button>
          </form>
          <div class="bg-green-200 mx-auto mt-6 p-2">
            <div class="flex justify-center space-x-2">
              <svg role="status" class="mr-2 w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-green-900" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
              </svg>
              <p class="text-green-900 text-center font-semibold"><?php echo $successMSG; ?></p>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if (isset($errMSG)) {
        ?>
          <div class="bg-red-200 mx-auto mt-6 p-2">
            <div class="flex justify-center space-x-2">
              <svg class="w-6 h-6 stroke-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <p class="text-red-900 text-center font-semibold"> <?php echo $errMSG; ?></p>
            </div>
          </div>
        <?php
        }
        ?>
        <div class="mt-7 text-center text-xs">
          <span>
            ©
            <a href="#" rel="" target="_blank" title="" class="text-gray-800 hover:text-purple-600 ">Oncocenter</a></span>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
  <script type="text/javascript">
    window.setTimeout(function() {
      document.getElementById("clickButton").click();
    }, 1500);
  </script>
</body>

</html>