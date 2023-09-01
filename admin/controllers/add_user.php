<?php
require "../../db_config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($name) || empty($email) || empty($password)) {
  echo 'Todos os campos são obrigatórios.';
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Endereço de email inválido.';
  exit;
}

$password_cript = password_hash($password, PASSWORD_DEFAULT);

$img = null;

if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
  $img = file_get_contents($_FILES['img']['tmp_name']);
}

session_start();

try {
  $sql = "INSERT INTO users (name, email, password, img) VALUES (?, ?, ?, ?)";
  $stmt = $DB_con->prepare($sql);
  $img_lob = $img . PDO::PARAM_LOB;
  $resultado = $stmt->execute([$name, $email, $password_cript, $img_lob]);
} catch (PDOException) {
  $_SESSION['error_message'] = "Erro!Tente novamente";
  header("Location: ../../login.php"); // Redireciona para a página de login
  exit();
}

if ($resultado) {
  $_SESSION['success_message'] = "Usuário cadastrado com sucesso!";
  header("Location: ../login.php"); // Redireciona para a página de login
  exit();
} else {
  $_SESSION['error_message'] = "Erro!";
  header("Location: ../../login.php"); // Redireciona para a página de login
  exit();
}
