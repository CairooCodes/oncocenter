<?php
function updateAbout($id, $maintext)
{
  global $DB_con;
  $stmt = $DB_con->prepare("UPDATE about SET maintext=:maintext WHERE id = :id");
  $stmt->bindParam(':maintext', $maintext);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}

function updatePost($id, $title, $subtitle, $info, $img)
{
  global $DB_con;
  if ($img) {
    $img_lob = $img . PDO::PARAM_LOB;
    $stmt = $DB_con->prepare("UPDATE posts SET title = :title, subtitle = :subtitle, info = :info, img = :img WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':subtitle', $subtitle);
    $stmt->bindParam(':info', $info);
    $stmt->bindValue(':img', $img_lob, PDO::PARAM_LOB);
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
