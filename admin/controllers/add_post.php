<?php
require "../../db_config.php";

$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$info = $_POST['info'];
$type = $_POST['type'];

$dom = new DOMDocument();
$dom->loadHTML($info);

$uploadDir = '../uploads/post/';

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

$new_info = $dom->saveHTML();

$sql = "INSERT INTO posts (title, info, img, subtitle, type) VALUES (?,?,?,?,?)";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$title, $info, $imgPath, $subtitle, $type]);
header('Location: ../blog.php');
