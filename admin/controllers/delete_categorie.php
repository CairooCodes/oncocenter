<?php
require "../../db_config.php";

if (!empty($_GET['id'])) {

  $id = $_GET['id'];
  deleteCategorie($id);
  header('Location: ../especialidades.php');
  exit();
} else {

  header('Location: ../especialidades.php');
  exit();
}

function deleteCategorie($id)
{
  global $DB_con;
  $stmt = $DB_con->prepare("DELETE FROM specialties  WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
