<?php

/**
 * Carrega a conexão com o banco de dados.
 */
require __DIR__ . "/connect.php";

/**
 * Obtém a conexão com o banco.
 */
$pdo = Connect::getInstance();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

    <h1 class="mb-4">Cadastro de Alunos</h1>

<div class="card p-4 shadow-sm">
    <!-- Formulário de cadastro de alunos -->
    <form action="store.php" method="post">
        <p>
            <label for="name">Nome:</label>
            <input type="text" name="name" class="form-control" required>
        </p>

        <p>
            <label>E-mail:</label><br>
            <input type="email" name="email" class="form-control" required>
        </p>

        <p>
            <label>Curso:</label><br>
            <input type="text" name="document" class="form-control" required>
        </p>

        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>

        <!-- Link para acessar a listagem de alunos -->
        <p class="mt-3 mb-0"><a href="lista.php">Ir para lista de alunos cadastrados</a></p>
    </form>
</div>
</div>
</body>

</html>