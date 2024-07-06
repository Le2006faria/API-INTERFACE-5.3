<?php
// src/models/Pessoa.php

class Pessoa {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insert($name, $age, $sex, $email) {
        $name = $this->conn->real_escape_string($name);
        $age = intval($age);
        $sex = $this->conn->real_escape_string($sex);
        $email = $this->conn->real_escape_string($email);

        $sql = "INSERT INTO pessoas (nome, idade, sexo, email) VALUES ('$name', $age, '$sex', '$email')";
        return $this->conn->query($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM pessoas";
        return $this->conn->query($sql);
    }    
    
    public function getById($id) {
        $id = intval($id);
        $sql = "SELECT * FROM pessoas WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function update($id, $name, $age, $sex, $email) {
        $id = intval($id);
        $name = $this->conn->real_escape_string($name);
        $age = intval($age);
        $sex = $this->conn->real_escape_string($sex);
        $email = $this->conn->real_escape_string($email);

        $sql = "UPDATE pessoas SET nome='$name', idade=$age, sexo='$sex', email='$email' WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        $id = intval($id);
        $sql = "DELETE FROM pessoas WHERE id=$id";
        return $this->conn->query($sql);
    }
}
?>
