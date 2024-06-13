<?php

include 'Database.php';



class UserController {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }



    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }



    public function createUser($data) {
        $sql = "INSERT INTO users (name, phone) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $data['name'], $data['phone']);
        $stmt->execute();
        $stmt->close();
    }

}