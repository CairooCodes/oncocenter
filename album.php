<?php
require "db_config.php";
require "config/helper.php";
require "config/url.class.php";
require "./functions/get.php";

$album;
$URI = new URI();

function remove_simbolos_acentos($string)
{
  $string = trim(strtolower($string));
  $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
  $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
  $string = strtr($string, utf8_decode($a), $b);
  $string = str_replace(".", "-", $string);
  $string = preg_replace("/[^0-9a-zA-Z\.]+/", '-', $string);
  return utf8_decode(rtrim($string, "-"));
}


$url = explode("/", $_SERVER['REQUEST_URI']);
$idpost = $url[3];

$idpost2 = "";

$stmt = $DB_con->prepare("SELECT * FROM posts");
$stmt->execute();
if ($stmt->rowCount() > 0) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $string1 = remove_simbolos_acentos(utf8_decode($idpost));
    $string2 = remove_simbolos_acentos(utf8_decode($title));
    if ($string1 == $string2) {
      $idpost2 = $title;
      $posts = getPost($id);
    }
  }
}

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
  <div class="mx-auto max-w-7xl px-2 pt-4">
    <?php foreach ($posts as $posts) { ?>
      <div>
        <h1 style="color: #013589;" class="text-center mt-3 text-3xl font-extrabold leading-9 tracking-tight dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-left md:text-3xl md:leading-14"><?php echo $posts['title']; ?></h1>
        <div class="mb-8 mt-4 rounded-xl p-2 shadow-md shadow-blue-200">
          <div class="grid lg:grid-cols-4 gap-8">
            <?php if ($posts['images']) {
              $imagens = unserialize($posts['images']);
              foreach ($imagens as $imagem) {
                $imgs = base64_encode($imagem);
                echo "<div><img class='h-56 lg:h-62 w-full' src='data:image/jpeg;base64," . $imgs . "'></div>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    <?php }
    ?>


    <?php include "./components/footer.php" ?>
    <script src="./assets/js/script.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>