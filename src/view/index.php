<?php
require_once '../model/Database.php';
require_once '../model/Pessoa.php';

// Teste simples de conexão
$db = new Database();
if ($db->conn) {
    echo "Conexão bem-sucedida!";
} else {
    echo "Falha na conexão.";
}
?>
<?php
// src/views/index.php

include_once '../controller/PessoaController.php';
$pessoaController = new PessoaController();
$pessoas = $pessoaController->list();

$message = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<?php include 'header.php'; ?>

<?php if ($message == 'success'): ?>
    <p>Nova pessoa inserida com sucesso!</p>
<?php elseif ($message == 'error'): ?>
    <p>Ocorreu um erro. Tente novamente.</p>
<?php elseif ($message == 'updated'): ?>
    <p>Pessoa atualizada com sucesso!</p>
<?php elseif ($message == 'deleted'): ?>
    <p>Pessoa excluída com sucesso!</p>
<?php endif; ?>


<h1>Lista de Pessoas</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Sexo</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php
if (!empty($pessoas)) {
    foreach ($pessoas as $row) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["idade"] . "</td>";
        echo "<td>" . $row["sexo"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>
                <a href='update.php?id=" . $row["id"] . "'>Editar</a>
                <a href='delete.php?id=" . $row["id"] . "'>Excluir</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhuma pessoa encontrada</td></tr>";
}
?>


</table>

<?php include 'form.php'; ?>
<?php include 'footer.php'; ?>
