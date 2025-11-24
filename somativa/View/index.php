<?php
require_once __DIR__ . '/../Controller/LivroController.php';

$controller = new LivroController();
$acao = $_POST['acao'] ?? '';
$editarlivro = null;

// --- Processamento das ações ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CRIAR novo livro
    if ($acao === 'criar') {
        $controller->criar(
            trim($_POST['titulo']),
            trim($_POST['autor']),
            trim($_POST['ano']),
            trim( $_POST['genero']),
            (int) $_POST['qtde']
        );
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    // DELETAR livro existente
    if ($acao === 'deletar') {
        $controller->deletar(trim($_POST['titulo']));
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    // ENTRAR NO MODO DE EDIÇÃO
    if ($acao === 'editar') {
        $editarlivro = $controller->buscarPortitulo(trim($_POST['titulo']));
    }

    // ATUALIZAR titulo existente
    if ($acao === 'atualizar') {
        $controller->atualizar(
            trim($_POST['titulo_original']),
            trim($_POST['titulo']),
            trim($_POST['autor']),
            (int)$_POST['ano'],
            trim($_POST['genero']),
            (int) $_POST['qtde']
        );
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
}

// LER livros cadastrados
$lista = $controller->ler();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de livros</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h1>Gerenciamento de livros</h1>
<br>
<hr>

<?php if ($editarlivro): ?>
    <!-- Formulário de atualização -->
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="titulo_original" value="<?= htmlspecialchars($editarlivro->gettitulo()) ?>">

        <input type="text" name="titulo" placeholder="Nome do livro:" required value="<?= htmlspecialchars($editarlivro->gettitulo()) ?>">
        <input type="text" name="autor" placeholder="Nome do autor:" required value="<?= htmlspecialchars($editarlivro->getautor()) ?>">

        <input type="number" name="ano" placeholder="Ano de publicação" required value="<?= htmlspecialchars($editarlivro->getano()) ?>">
        <input type="text" name="genero" placeholder="genero do livro" required value="<?= htmlspecialchars($editarlivro->getgenero()) ?>">
        <input type="number" name="qtde" placeholder="Quantidade em estoque:" required value="<?= htmlspecialchars($editarlivro->getQtde()) ?>">

        <button type="submit">Atualizar</button>
    </form>

<?php else: ?>
    <!-- Formulário de criação -->
    <form method="POST">
        <input type="hidden" name="acao" value="criar">
        <input type="text" name="titulo" placeholder="Nome do livro:" required>
        <input type="text" name="autor" placeholder="Nome do autor:" required>
        <input type="number" name="ano" placeholder="Ano de publicação" required>
        <input type="text" name="genero"placeholder="genero do livro" required>
        <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
        <button type="submit">Cadastrar</button>
    </form>
<?php endif; ?>

<hr>
<br><br>

<h2>Lista de livros</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Ano</th>
        <th>Genero</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>

    <?php if (!empty($lista)): ?>
        <?php foreach ($lista as $livro): ?>
            <tr>
                <td><?= htmlspecialchars($livro->gettitulo()) ?></td>
                <td><?= htmlspecialchars($livro->getautor()) ?></td>
                <td><?= htmlspecialchars($livro->getano()) ?></td>
                <td><?= htmlspecialchars($livro->getgenero()) ?></td>
                <td><?= htmlspecialchars($livro->getQtde()) ?></td>
                <td>
                    <!-- Botão Editar -->
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="titulo" value="<?= htmlspecialchars($livro->gettitulo()) ?>">
                        <input type="submit" value="Editar">
                    </form>

                    <!-- Botão Deletar -->
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="titulo" value="<?= htmlspecialchars($livro->gettitulo()) ?>">
                        <input type="submit" value="Deletar" onclick="return confirm('Tem certeza que deseja deletar este livro?');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">Nenhum livro cadastrada.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>