<?php
function updateAbout($id, $maintext)
{
  global $DB_con;
  $stmt = $DB_con->prepare("UPDATE about SET maintext=:maintext WHERE id = :id");
  $stmt->bindParam(':maintext', $maintext);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}

function updateBanner($id, $name, $img)
{
  global $DB_con;
  if ($img) {
    $stmt = $DB_con->prepare("UPDATE banners SET name = :name, img=:img WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindValue(':img', $img);
    $stmt->bindParam(':id', $id);
  } else {
    $stmt = $DB_con->prepare("UPDATE banners SET name = :name WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
  }
  $stmt->execute();
}

function updatePost($id, $title, $subtitle, $info, $img)
{
  global $DB_con;
  if ($img) {
    $stmt = $DB_con->prepare("UPDATE posts SET title = :title, subtitle = :subtitle, info = :info, img = :img WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':subtitle', $subtitle);
    $stmt->bindParam(':info', $info);
    $stmt->bindValue(':img', $img);
    $stmt->bindParam(':id', $id);
  } else {
    $stmt = $DB_con->prepare("UPDATE posts SET title = :title, subtitle = :subtitle, info=:info WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':subtitle', $subtitle);
    $stmt->bindParam(':info', $info);
    $stmt->bindParam(':id', $id);
  }
  $stmt->execute();
}

function updateDoctor($id, $name, $specialty, $crm, $contact, $date_nasc, $email, $instagram, $curriculum, $img, $rqe, $title_office)
{
  global $DB_con;
  if ($img) {
      $stmt = $DB_con->prepare("UPDATE doctors SET name = :name, specialty = :specialty, crm = :crm, contact = :contact, date_nasc = :date_nasc, email = :email, instagram = :instagram, curriculum = :curriculum, img = :img, rqe = :rqe, title_office = :title_office WHERE id = :id");
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':specialty', $specialty);
      $stmt->bindParam(':crm', $crm);
      $stmt->bindParam(':contact', $contact);
      $stmt->bindParam(':date_nasc', $date_nasc);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':instagram', $instagram);
      $stmt->bindParam(':curriculum', $curriculum);
      $stmt->bindParam(':img', $img);
      $stmt->bindParam(':rqe', $rqe);
      $stmt->bindParam(':title_office', $title_office);
      $stmt->bindParam(':id', $id);
  } else {
    $stmt = $DB_con->prepare("UPDATE doctors SET name = :name, specialty = :specialty, crm = :crm, contact = :contact, date_nasc = :date_nasc, email = :email, instagram = :instagram, curriculum = :curriculum, img = :img, rqe = :rqe, title_office = :title_office WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':specialty', $specialty);
    $stmt->bindParam(':crm', $crm);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':date_nasc', $date_nasc);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':instagram', $instagram);
    $stmt->bindParam(':curriculum', $curriculum);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':rqe', $rqe);
    $stmt->bindParam(':title_office', $title_office);
    $stmt->bindParam(':id', $id);
  }
  $stmt->execute();
}

