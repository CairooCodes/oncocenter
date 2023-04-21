<?php
session_start();
if (isset($_SESSION['logado'])) :
else :
  header("Location:login.php");
endif;
require "../db_config.php";

if (isset($_GET['delete_id'])) {
  $stmt_delete = $DB_con->prepare('DELETE FROM doctors WHERE id =:uid');
  $stmt_delete->bindParam(':uid', $_GET['delete_id']);
  $stmt_delete->execute();

  header("Location: corpo_clinico.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include "components/heads.php" ?>
  <?php include "config/twconfig.php"; ?>
</head>

<body>
  <?php include "components/sidebar.php" ?>
  <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <?php include "components/header.php" ?>
    <div class="px-6 pt-6 2xl:container">
      <a href="add_profissional.php">
        <button class="rigth bg-green-600 text-white px-3 py-2 rounded-md my-2">
          Adicionar Profissional
        </button>
      </a>
      <div class="pt-4 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php
        $stmt = $DB_con->prepare("SELECT * FROM doctors order by id desc");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
        ?>
          <div class="md:col-span-2 grid justify-items-center lg:col-span-1">
            <h1 class="text-center text-lg font-bold text-color1 h-16"><?php echo $name; ?></h1>
            <img class="w-48 h-48 rounded-md" src="./uploads/doctors/<?php echo $img ?>" onerror="this.src='../assets/img/semperfil.png'" />
            <div>
              <a href="editar_doctors.php?edit_id=<?php echo $row['id']; ?>">
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