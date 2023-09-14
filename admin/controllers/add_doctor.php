<?php
require "../../db_config.php";

$name = $_POST['name'];
$specialty = $_POST['specialty'];
$crm = $_POST['crm'];
$contact = $_POST['contact'];
$date_nasc = $_POST['date_nasc'];
$email = $_POST['email'];
$instagram = $_POST['instagram'];
$curriculum = $_POST['curriculum'];
$rqe = $_POST['rqe'];
$title_office = $_POST['title_office'];

$uploadDir = '../uploads/doctors/';

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


$sql = "INSERT INTO doctors (name, specialty, crm, contact, date_nasc, email, instagram, curriculum, img, rqe, title_office) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$name, $specialty, $crm, $contact, $date_nasc, $email, $instagram, $curriculum, $imgPath, $rqe, $title_office]);  
header('Location: ../dashboard.php');
