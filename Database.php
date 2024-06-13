<?php
include 'config.php';

class Database {
    private $link;

    public function __construct() {
        $this->link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
        if ($this->link === false) {
            die("Ошибка подключения к БД: " . mysqli_connect_error());
        }
    }

    public function query($sql) {
        $result = mysqli_query($this->link, $sql);
        if (!$result) {
            die("Ошибка выполнения запроса: " . mysqli_error($this->link));
        }
        return $result;
    }

    public function prepare($sql) {
        return $this->link->prepare($sql);
    }
}