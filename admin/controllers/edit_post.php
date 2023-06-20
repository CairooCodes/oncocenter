<?php
require "../../db_config.php";
require "../../functions/update.php";
if (!empty($_GET['id'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $id = $_POST['id'];
    $info = $_POST['info'];
    $img = null;

    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
      $img = file_get_contents($_FILES['img']['tmp_name']);
    }

    updatePost($id, $title, $subtitle, $info, $img);
    header('Location: ../blog.php');
    exit();
  }
} else {
  header('Location: ../blog.php');
  exit();
}
