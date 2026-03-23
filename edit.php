<?php

/**
 * Carrega o arquivo de conexão com o banco de dados.
 */
require __DIR__ . "/connect.php";

/**
 * Captura o parâmetro "id" enviado pela URL
 * e valida se ele é um número inteiro válido.
 *
 * Exemplo de URL:
 * edit.php?id=3
 */
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

/**
 * Se o ID não for válido, o script é interrompido.
 */
if (!$id) {
    die("ID inválido.");
}

/**
 * Obtém a conexão com o banco de dados.
 */
$pdo = Connect::getInstance();

/**
 * Prepara a consulta para buscar um aluno pelo ID.
 */
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");

/**
 * Executa a consulta, passando o ID informado.
 */
$stmt->execute([":id" => $id]);

/**
 * Busca o registro encontrado.
 */
$user = $stmt->fetch();

/**
 * Se nenhum aluno for encontrado, interrompe a execução.
 */
if (!$user) {
    die("Aluno não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h1 class="mb-4">Editar aluno</h1>

        <div class="card p-4 shadow-sm">

            <!-- Formulário de edição de aluno -->
            <form action="update.php" method="post">

                <!-- Campo oculto com o ID do aluno -->
                <input type="hidden" name="id" value="<?= $user["id"] ?>">

                <p>
                    <label for="name">Nome:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="<?= htmlspecialchars($user["name"]) ?>"
                        required>
                </p>

                <p>
                    <label for="email">E-mail:</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="<?= htmlspecialchars($user["email"]) ?>"
                        required>
                </p>

                <p>
                    <label for="document">Curso:</label>
                    <input
                        type="text"
                        id="document"
                        name="document"
                        class="form-control"
                        value="<?= htmlspecialchars($user["document"]) ?>"
                        required>
                </p>

                <!-- Botão para salvar as alterações -->
                <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
            </form>

            <!-- Link para retornar à listagem -->
            <div class="text-end mt-3">
                <a href="lista.php" class="btn btn-lista">Voltar para lista</a>
            </div>

        </div>
    </div>

</body>

</html>