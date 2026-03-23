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
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h1 class="mb-4">Cadastro de Alunos</h1>

        <div class="card p-4 shadow-sm">

            <!-- Formulário de cadastro de alunos -->
            <form action="store.php" method="post">
                <p>
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </p>

                <p>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </p>

                <p>
                    <label for="document">Curso:</label>
                    <input type="text" id="document" name="document" class="form-control" required>
                </p>

                <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>

                <!-- Link para acessar a listagem de alunos -->
                <div class="text-end mt-3">
                    <a href="lista.php" class="btn btn-lista">Ir para lista de alunos cadastrados</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>