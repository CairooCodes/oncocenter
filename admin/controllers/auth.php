<?php
require "../../db_config.php";
$email = $_POST['email'];
$password = $_POST['password'];
if (empty($email) || empty($password)) {
  echo json_encode(['error' => true, 'message' => 'Todos os campos são obrigatorios!']);
  exit;
}
$sql = "SELECT id, name, email, password FROM users WHERE email = ?";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  header('Location: ../login.php?login=failed');
  exit;
}

if (!password_verify($password, $user['password'])) {
  header('Location: ../login.php?login=failed');
  exit;
}

session_start();
$_SESSION['id'] = $user['id'];
$_SESSION['name'] = $user['name'];
$_SESSION['email'] = $user['email'];

$action = "login";
$date_time = date('Y-m-d H:i:s');
$sql_log = "INSERT INTO user_logs (user_id, action, date_time) VALUES (?, ?, ?)";
$stmt = $DB_con->prepare($sql_log);
$result_log = $stmt->execute([$_SESSION['id'], $action, $date_time]);

header('Location: ../dashboard.php');
exit;
