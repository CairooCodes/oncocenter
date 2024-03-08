<?php
require "../../db_config.php";
$name = $_POST['name'];
$name = str_replace('/', '<br>', $name);

$sql = "INSERT INTO specialties (name) VALUES (?)";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$name]);
header('Location: ../dashboard.php');
