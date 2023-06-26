<?php
require "../../db_config.php";

// Verificar se o ID do banner foi enviado
if (!empty($_GET['id'])) {
  // Obter o ID do banner
  $id = $_GET['id'];
  deletePost($id);
  header('Location: ../blog.php');
  exit();
} else {
  // Redirecionar para a página de lista de blog se o ID do banner não for fornecido
  header('Location: ../blog.php');
  exit();
}

// Função para excluir um banner pelo ID
function deletePost($id)
{
  global $DB_con;
  $stmt = $DB_con->prepare("DELETE FROM posts WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
