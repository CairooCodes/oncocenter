<?php
require "../../db_config.php";
require "../../functions/update.php";

if (!empty($_GET['id'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $maintext = $_POST['maintext'];
    updateAbout($id, $maintext);
    header('Location: ../dashboard.php');
    exit();
  }
} else {
  header('Location: ../dashboard.php');
  exit();
}
