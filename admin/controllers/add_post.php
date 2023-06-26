<?php
require "../../db_config.php";

$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$info = $_POST['info'];
$type = $_POST['type'];
$imagens = [];

$dom = new DOMDocument();
$dom->loadHTML($info);

$img = null;

if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
  $img = file_get_contents($_FILES['img']['tmp_name']);
}

if (!empty($_FILES['imagens']['tmp_name'][0])) {
  foreach ($_FILES['imagens']['tmp_name'] as $key => $tmp_name) {
    $imagens[] = file_get_contents($_FILES['imagens']['tmp_name'][$key]);
  }
}

$new_info = $dom->saveHTML();

$sql = "INSERT INTO posts (title, info, img, subtitle, type, images) VALUES (?,?,?,?,?,?)";
$stmt = $DB_con->prepare($sql);
$img_lob = $img . PDO::PARAM_LOB;
$imgs = serialize($imagens) . PDO::PARAM_LOB;
$stmt->execute([$title, $info, $img_lob, $subtitle, $type, $imgs]);
header('Location: ../blog.php');
