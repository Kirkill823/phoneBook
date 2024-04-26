<?php

include "../configs/config.php";

//Создаем подключение
function dataBaseConnect(){
    $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
        if ($link === false){
            $err = "Ошибка подклбчение к БД №" . mysqli_connect_error();
            return $err;
        }
        else {return $link;}
    }



//Создаем обьект в БД
function createUser($name, $phone){
    $sql = "INSERT INTO users (name, phone) VALUES ('{$name}','{$phone}')";
    $link = dataBaseConnect();
    $result = mysqli_query($link, $sql);
    //return mysqli_fetch_array($result);
}

// Возвращаем массив всех пользователей
function selectUsers(){
    $sql = "SELECT * FROM users";
    $link = dataBaseConnect();
    $result = mysqli_query($link, $sql);

    // Добавляем каждую строку результата в массив пользователей
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row; 
    }
    return $users; 
}

function delete( $id ){
    $sql = "DELETE FROM users WHERE id = {$id}";
    $link = dataBaseConnect();
    $result = mysqli_query($link, $sql);
    return $result;
}