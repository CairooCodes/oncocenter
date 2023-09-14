<?php
require "../../db_config.php";

// Verificar se o ID do cliente foi enviado
if (!empty($_GET['id'])) {
  // Obter o ID do cliente
  $id = $_GET['id'];
  deleteBanner($id);
  header('Location: ../banners.php');
  exit();
} else {
  // Redirecionar para a página de lista de clientes se o ID do cliente não for fornecido
  header('Location: ../banners.php');
  exit();
}

// Função para excluir um cliente pelo ID
function deleteBanner($id)
{
  global $DB_con;
  $stmt = $DB_con->prepare("DELETE FROM banners WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
