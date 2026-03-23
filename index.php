<?php

/**
<<<<<<< HEAD
 * Carrega a conexão com o banco de dados.
=======
 * Inclui o arquivo de conexão com o banco de dados.
 *
 * __DIR__ retorna o diretório atual do arquivo,
 * o que evita problemas de caminho relativo.
>>>>>>> 4e9339113163cc35dc37de6769f47e0a188ef372
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
    <title>CRUD PHP</title>
</head>

<body>

    <h1>Cadastro de Alunos</h1>

    <!-- Formulário de cadastro de alunos -->
    <form action="store.php" method="post">
        <p>
            <label>Nome:</label><br>
            <input type="text" name="name" required>
        </p>

        <p>
            <label>E-mail:</label><br>
            <input type="email" name="email" required>
        </p>

        <p>
            <label>Curso:</label><br>
            <input type="text" name="document" required>
        </p>

        <button type="submit">Cadastrar</button>

<!-- Link para acessar a listagem de alunos -->
        <p><a href="lista.php">Ir para lista de alunos cadastrados</a></p>
    </form>

</body>

</html>