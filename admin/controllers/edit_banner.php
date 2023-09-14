<?php
require "../../db_config.php";
require "../../functions/update.php";
if (!empty($_GET['id'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $id = $_POST['id'];

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

    updateBanner($id, $name, $imgPath);
    header('Location: ../banners.php');
    exit();
  }
} else {
  header('Location: ../banners.php');
  exit();
}
