<?php
require "../../db_config.php";

$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$info = $_POST['info'];

$dom = new DOMDocument();
$dom->loadHTML($info);

$img = null;

if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
  $img = file_get_contents($_FILES['img']['tmp_name']);
}

$new_info = $dom->saveHTML();

$sql = "INSERT INTO posts (title, info, img, subtitle) VALUES (?,?,?,?)";
$stmt = $DB_con->prepare($sql);
$img_lob = $img . PDO::PARAM_LOB;
$stmt->execute([$title, $info, $img_lob, $subtitle]);
header('Location: ../blog.php');
