<?php
session_start();
if (isset($_SESSION['logado'])) :
else :
  header("Location:login.php");
endif;
require "../db_config.php";

if (isset($_GET['delete_id'])) {
  $stmt_delete = $DB_con->prepare('DELETE FROM banners WHERE id =:uid');
  $stmt_delete->bindParam(':uid', $_GET['delete_id']);
  $stmt_delete->execute();

  header("Location: banners.php");
}

$page = 'banners';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include "components/heads.php" ?>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./assets/css/swiper.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <?php include "config/twconfig.php"; ?>
</head>

<body>
  <?php include "components/sidebar.php" ?>
  <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <?php include "components/header.php" ?>
    <div class="px-6 pt-6 2xl:container">
      <a href="./add_banner.php">
        <button class="rigth bg-green-600 text-white px-3 py-2 rounded-md my-2">
          Adicionar Banner
        </button>
      </a>
      <div class="pt-4 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php
        $stmt = $DB_con->prepare("SELECT * FROM banners order by id desc");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
        ?>
          <div class="grid justify-items-center md:col-span-2 lg:col-span-1">
            <h1 class="text-center text-lg font-bold text-color1"><?php echo $name; ?></h1>
            <img class="max-h-48" src="./uploads/banners/<?php echo $img ?>" onerror="this.src='../assets/img/semperfil.png'"/>
            <div>
            <a href="editar_banner.php?edit_id=<?php echo $row['id']; ?>">
              <button class="bg-color1 text-white px-3 py-2 rounded-md my-2">
                editar
              </button>
            </a>
            <a href="?delete_id=<?php echo $row['id']; ?>">
              <button class="bg-red-600 text-white px-3 py-2 rounded-md my-2">
                excluir
              </button>
            </a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>