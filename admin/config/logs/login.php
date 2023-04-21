<?php
error_reporting(E_PARSE);
if (isset($_POST["submit"])) {

  try {
    include "../../../db_config.php";
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO logs (name, type) VALUES ('" . $_POST["name"] . "','" . $_POST["type"] . "')";
    if ($DB_con->query($sql)) {
      echo ("<script>window.location = 'dashboard.php';</script>");
    } else {
      echo "<script type= 'text/javascript'>alert('Erro.');</script>";
    }

    $DB_con = "";
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
