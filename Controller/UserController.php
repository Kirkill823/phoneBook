<?php

include_once "../model/UserModel.php";


//Маршрутизатор запросов 2000
if ($_POST['action'] == 'create') { createAction();}
if ($_POST['action'] == 'select') { selectAction();}
if ($_POST['action'] == 'del') { deleteAction();}

function createAction(){
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);


    $exist = createUser($name, $phone);
    if(!$exist){
        $data['success'] = 1;
        $data['message'] = "Повезло-повезло";
    }
    else{
        $data['success'] = 0;
        $data['message'] = "Пользователь с таким email уже существует";
    }
    echo json_encode($data);
}

//ВЫВОЖУ ОБЪЕКТЫ БАЗЫ В JSON
function selectAction(){
    $values = selectUsers();
    echo json_encode($values);
}

//Удаление
function deleteAction(){
    $id = $_POST["id"];
    $success = delete($id);
    if($success){
    $data["success"] = 1;
    $data["message"] = "Удалено";
    } 
    else{
        $data["success"] = 0;
        $data["message"] = "Непредвиденная ошибка";
    }
    echo json_encode($data);
}