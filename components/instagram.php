<?php
header('Content-Type: application/json');

// Lista de domínios permitidos
$allowed_domains = ['http://localhost/oncocenter/', 'http://www.localhost/oncocenter/'];

// Verificar a origem da solicitação
if (isset($_SERVER['HTTP_ORIGIN'])) {
    $origin = $_SERVER['HTTP_ORIGIN'];
    if (in_array($origin, $allowed_domains)) {
        header("Access-Control-Allow-Origin: $origin");
        header('Access-Control-Allow-Methods: GET');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    } else {
        echo json_encode(['error' => 'Acesso não autorizado']);
        http_response_code(403);
        exit;
    }
}

// Lidar com pré-verificações CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; // Método OPTIONS é usado para pré-verificações CORS, então saímos aqui
}

// Exibir todos os erros (para fins de depuração)
ini_set('display_errors', 1);
error_reporting(E_ALL);

$token = 'IGQWRPVXdkZAk1JcDJ0cDZARTUg0akNoLVF4X3FudXJHeThVel92SF9ib3p3TEFFY0daeEFlMHhvUTRlQmZAHeXJMQS1HX0tRem5KVFBSd0o5eFA4VjhYNjA4TW1mWnFYMnBQZAFNBTEc3MU9kU2hLbkJrWmFOVl9tbUkZD';
$campos = 'media_type,media_url,thumbnail_url,permalink';
$limite = 5;
$url = "https://graph.instagram.com/me/media?fields={$campos}&access_token={$token}&limit={$limite}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($http_code === 200) {
    echo $response;
} else {
    // Adicionando log para ajudar na depuração
    echo json_encode(['error' => 'Erro ao buscar dados do Instagram', 'http_code' => $http_code, 'response' => $response]);
}
