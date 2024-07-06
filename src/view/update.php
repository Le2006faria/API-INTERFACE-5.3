<?php
// src/views/update.php

require_once '../controller/PessoaController.php';
$pessoaController = new PessoaController();

// Verifica se foi enviado um ID válido via GET
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Obtém os dados da pessoa pelo ID
$pessoa = $pessoaController->update();

// Verifica se houve um erro ao obter os dados
if (!$pessoa) {
    header("Location: index.php?msg=error");
    exit;
}

// Lógica para atualizar os dados da pessoa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];

    // Chama o método de atualização no controlador
    if ($pessoaController->update($id, $name, $age, $sex, $email)) {
        header("Location: index.php?msg=updated");
        exit;
    } else {
        header("Location: update.php?id=$id&msg=error");
        exit;
    }
}
?>

<?php include 'header.php'; ?>

<?php if (isset($_GET['msg']) && $_GET['msg'] == 'error'): ?>
    <p>Ocorreu um erro. Tente novamente.</p>
<?php endif; ?>

<h1>Atualizar Pessoa</h1>
<form method="post" action="../controller/PessoaController.php?action=update">
    <input type="hidden" name="id" value="<?php echo $pessoa['id']; ?>">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="<?php echo $pessoa['nome']; ?>" required><br><br>
    
    <label for="age">Idade:</label>
    <input type="number" id="age" name="age" value="<?php echo $pessoa['idade']; ?>" required><br><br>
    
    <label for="sex">Sexo:</label>
    <input type="text" id="sex" name="sex" value="<?php echo $pessoa['sexo']; ?>" required><br><br>
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $pessoa['email']; ?>" required><br><br>
    
    <input type="submit" name="update" value="Atualizar">
</form>

<?php include 'footer.php'; ?>
