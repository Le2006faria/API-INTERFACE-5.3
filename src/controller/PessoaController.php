<?php
// src/controllers/PessoaController.php

require_once '../model/Database.php';
require_once '../model/Pessoa.php';

class PessoaController {
    private $db;
    private $pessoa;

    public function __construct() {
        $this->db = new Database();
        $this->pessoa = new Pessoa($this->db->conn);
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $email = $_POST['email'];

            if ($this->pessoa->insert($name, $age, $sex, $email)) {
                header("Location: ../view/index.php?msg=success");
                exit();
            } else {
                header("Location: ../view/form.php?msg=error");
                exit();
            }
        }
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $email = $_POST['email'];

            if ($this->pessoa->update($id, $name, $age, $sex, $email)) {
                header("Location: ../view/index.php?msg=updated");
                exit();
            } else {
                header("Location: ../view/update.php?id=$id&msg=error");
                exit();
            }
        } else {
            $id = $_GET['id'];
            $result = $this->pessoa->getById($id);
            return $result->fetch_assoc();
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->pessoa->delete($id)) {
                header("Location: ../view/index.php?msg=deleted");
                exit();
            } else {
                header("Location: ../view/index.php?msg=error");
                exit();
            }
        }
    }

    public function list() {
        $result = $this->pessoa->getAll();
        
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return array(); // Retorna um array vazio se não houver resultados
        }
    }    
    
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$controller = new PessoaController();

switch ($action) {
    case 'insert':
        $controller->insert();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        break;
}
?>
