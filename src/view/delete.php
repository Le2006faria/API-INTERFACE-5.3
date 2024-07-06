<?php
// src/views/delete.php

require_once '../controller/PessoaController.php';
$pessoaController = new PessoaController();
$pessoaController->delete();
?>
