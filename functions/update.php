<?php
function updateAbout($id, $maintext)
{
  global $pdo;
  $stmt = $pdo->prepare("UPDATE about SET maintext=:maintext WHERE id = :id");
  $stmt->bindParam(':maintext', $maintext);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
