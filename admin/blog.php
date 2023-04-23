<?php
session_start();
if (isset($_SESSION['logado'])) :
else :
  header("Location:login.php");
endif;
require "../db_config.php";

if (isset($_GET['delete_id'])) {
  $stmt_delete = $DB_con->prepare('DELETE FROM posts WHERE id =:uid');
  $stmt_delete->bindParam(':uid', $_GET['delete_id']);
  $stmt_delete->execute();

  header("Location: blog.php");
}
$page = 'blog';
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
      <a href="add_post.php">
        <button class="rigth bg-green-600 text-white px-3 py-2 rounded-md my-2">
          Adicionar Postagem
        </button>
      </a>
      <div class="pt-4 grid justify-items-center gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php
        $stmt = $DB_con->prepare("SELECT * FROM posts order by id desc");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            extract($row);
        ?>
          <div class="md:col-span-2 grid justify-items-center lg:col-span-1">
            <h1 class="text-center text-lg font-bold text-color1"><?php echo $title; ?></h1>
            <?php
            if (!empty($img)) {
              $img2 = base64_encode($img);
              echo "<img class='h-60 w-full rounded-md' src='data:image/jpeg;base64," . $img2 . "'>";
            }
            ?>
            <div>
              <a href="editar_post.php?edit_id=<?php echo $id; ?>">
                <button class="bg-color1 text-white px-3 py-2 rounded-md my-2">
                  editar
                </button>
              </a>
              <a href="?delete_id=<?php echo $id; ?>">
                <button class="bg-red-600 text-white px-3 py-2 rounded-md my-2">
                  excluir
                </button>
              </a>
            </div>
          </div>
        <?php
        } else {
        ?>
          <span class="font-bold">Sem postagem cadastrada...</span>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>