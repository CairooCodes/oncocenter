<?php
function updateAbout($id, $maintext)
{
  global $DB_con;
  $stmt = $DB_con->prepare("UPDATE about SET maintext=:maintext WHERE id = :id");
  $stmt->bindParam(':maintext', $maintext);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
