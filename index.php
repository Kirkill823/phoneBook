<?php

include 'UserController.php';

header('Content-Type: application/json');

$database = new Database();
$userController = new UserController($database);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$response = ['success' => false, 'message' => ''];


if ($requestMethod === 'GET') {
    $response['data'] = $userController->getAllUsers();
    $response['success'] = true;
} elseif ($requestMethod === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['name']) && isset($input['phone'])) {
        $userController->createUser($input);
        $response['success'] = true;
        $response['message'] = 'Пользователь успешно создан';
    } else {
        $response['message'] = 'Неправильные данные';
    }
} else {
    $response['message'] = 'Неподдерживаемый метод';
}


echo json_encode($response);