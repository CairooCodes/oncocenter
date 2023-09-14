<?php
require "../../db_config.php";
require "../../functions/update.php";
if (!empty($_GET['id'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    $id = $_POST['id'];
    
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
    
    updateDoctorupdateDoctor($id, $name, $specialty, $crm, $contact, $date_nasc, $email, $instagram, $curriculum, $imgPath, $rqe, $title_office);
    header('Location: ../dashboard.php');
    exit();
  }
} else {
  header('Location: ../dashboard.php');
  exit();
}
