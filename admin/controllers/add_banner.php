<?php
require "../../db_config.php";

$name = $_POST['name'];
$link = $_POST['link'];  // <-- Novo campo

$uploadDir = '../uploads/banners/';

$imgPath = null;

if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
  $imgTmpName = $_FILES['img']['tmp_name'];
  $imgName = $_FILES['img']['name'];

  $uniqueName = uniqid() . '_' . $imgName;

  if (move_uploaded_file($imgTmpName, $uploadDir . $uniqueName)) {
    $imgPath = $uniqueName;
  } else {
    echo 'Erro ao fazer o upload da imagem.';
    exit;
  }
}

$sql = "INSERT INTO banners (name, img, link) VALUES (?,?,?)";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$name, $imgPath, $link]);

header('Location: ../banners.php');
