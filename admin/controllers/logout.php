<?php
require "../../db_config.php";
session_start();
$action = "logout";
$date_time = date('Y-m-d H:i:s');
$sql_log = "INSERT INTO user_logs (user_id, action, date_time) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql_log);
$result_log = $stmt->execute([$_SESSION['id'], $action, $date_time]);
session_destroy();
header('Location: ../login.php');
exit;