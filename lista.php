<?php

/**
 * Carrega a conexão com o banco de dados.
 */
require __DIR__ . "/connect.php";

/**
 * Obtém a conexão com o banco.
 */
$pdo = Connect::getInstance();

/**
 * Busca todos os alunos cadastrados.
 */
$stmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");

/**
 * Armazena os alunos retornados pela consulta.
 */
$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">

    <h1 class="mb-4">Lista de alunos</h1>

    <p><a href="index.php" class="btn btn-success mb-3">Cadastrar novo aluno</a></p>

<!-- Tabela de listagem dos alunos -->
<div class="card p-3 shadow-sm">
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Curso</th>
                <th>Cadastrado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

<!-- Exibe os alunos cadastrados -->
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user["id"] ?></td>
                    <td><?= htmlspecialchars($user["name"]) ?></td>
                    <td><?= htmlspecialchars($user["email"]) ?></td>
                    <td><?= htmlspecialchars($user["document"]) ?></td>
                    <td><?= date("d/m/Y H:i", strtotime($user["created_at"])) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $user["id"] ?>" class="btn btn-sm btn-warning me-2">Editar</a>
                        <a href="delete.php?id=<?= $user["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">Total de alunos: <?= count($users) ?></td>
            </tr>
        </tfoot>
    </table>
</div>
    </div>
</body>

</html>