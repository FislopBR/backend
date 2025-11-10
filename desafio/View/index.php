<?php
require_once __DIR__ . '/../controller/BebidaController.php';

$controller = new BebidaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['nome']);
    } elseif ($_POST['acao'] === 'editar') {
        $controller->atualizar(
            $_POST['nome_antigo'], // O nome original para encontrar a bebida
            $_POST['nome'],
            $_POST['categoria'],
            $_POST['volume'],
            $_POST['valor'],
            $_POST['qtde']
        );
    }
}

$lista = $controller->ler();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de bebidas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Gerenciamento de bebidas</h1>
    <hr><br>

    <form method="POST">
        <input type="hidden" name="acao" value="salvar">
        <input type="text" name="nome" placeholder="Nome da bebida:" required>
        <select name="categoria" required>
            <option value="">Selecione a categoria</option>
            <option value="Refrigerante">Refrigerante</option>
            <option value="Cerveja">Cerveja</option>
            <option value="Vinho">Vinho</option>
            <option value="Destilado">Destilado</option>
            <option value="Água">Água</option>
            <option value="Suco">Suco</option>
            <option value="Energético">Energético</option>
        </select>
        <input type="text" name="volume" placeholder="Volume (ex: 300ml):" required>
        <input type="number" name="valor" step="0.01" placeholder="Valor em Reais (R$):" required>
        <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
        <button type="submit">Cadastrar</button>
    </form>

    <br><hr><br>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Volume</th>
                <th>Valor (R$)</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lista)): ?>
                <?php foreach ($lista as $bebida): ?>
                    <tr>
                        <td><?= htmlspecialchars($bebida->getNome()) ?></td>
                        <td><?= htmlspecialchars($bebida->getCategoria()) ?></td>
                        <td><?= htmlspecialchars($bebida->getVolume()) ?></td>
                        <td><?= htmlspecialchars(number_format($bebida->getValor(), 2, ',', '.')) ?></td>
                        <td><?= htmlspecialchars($bebida->getQtde()) ?></td>
                        <td>
                            <!-- Formulário de edição -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="acao" value="editar">
                                <input type="hidden" name="nome_antigo" value="<?= htmlspecialchars($bebida->getNome()) ?>">
                                
                                <input type="text" name="nome" value="<?= htmlspecialchars($bebida->getNome()) ?>" placeholder="Novo Nome" required>
                                
                                <select name="categoria" required>
                                    <option value="Refrigerante" <?= $bebida->getCategoria() === 'Refrigerante' ? 'selected' : '' ?>>Refrigerante</option>
                                    <option value="Cerveja" <?= $bebida->getCategoria() === 'Cerveja' ? 'selected' : '' ?>>Cerveja</option>
                                    <option value="Vinho" <?= $bebida->getCategoria() === 'Vinho' ? 'selected' : '' ?>>Vinho</option>
                                    <option value="Destilado" <?= $bebida->getCategoria() === 'Destilado' ? 'selected' : '' ?>>Destilado</option>
                                    <option value="Água" <?= $bebida->getCategoria() === 'Água' ? 'selected' : '' ?>>Água</option>
                                    <option value="Suco" <?= $bebida->getCategoria() === 'Suco' ? 'selected' : '' ?>>Suco</option>
                                    <option value="Energético" <?= $bebida->getCategoria() === 'Energético' ? 'selected' : '' ?>>Energético</option>
                                </select>
                                
                                <input type="text" name="volume" value="<?= htmlspecialchars($bebida->getVolume()) ?>" placeholder="Novo Volume (ex: 300ml)" required>
                                
                                <input type="number" name="valor" step="0.01" value="<?= htmlspecialchars($bebida->getValor()) ?>" placeholder="Novo valor" required>
                                
                                <input type="number" name="qtde" value="<?= htmlspecialchars($bebida->getQtde()) ?>" placeholder="Nova qtde" required>
                                
                                <button type="submit">Editar</button>
                            </form>

                            <!-- Formulário de exclusão -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="acao" value="deletar">
                                <input type="hidden" name="nome" value="<?= htmlspecialchars($bebida->getNome()) ?>">
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Nenhuma bebida cadastrada.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
