<?php
require "../../db_config.php";

$name = $_POST['name'];

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

$sql = "INSERT INTO banners (name, img) VALUES (?,?)";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$name, $imgPath]);
header('Location: ../banners.php');
