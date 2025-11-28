<?php
include 'db_connect.php';
$id = $_GET['id']; // Pega o ID da URL

// Busca os dados atuais do funcionário
$sql = "SELECT * FROM funcionario WHERE id_func = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // 'i' = integer
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Funcionário: <?php echo $row['nome_func']; ?></h2>
        
        <form action="atualizar_funcionario.php" method="POST">
            <input type="hidden" name="id_func" value="<?php echo $row['id_func']; ?>">
            
            <label>Nome:</label>
            <input type="text" name="nome_func" value="<?php echo $row['nome_func']; ?>" required>
            
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?php echo $row['cpf']; ?>" required>

            <label>Telefone:</label>
            <input type="text" name="cell_func" value="<?php echo $row['cell_func']; ?>">
            
            <label>Cargo:</label>
            <input type="text" name="cargo" value="<?php echo $row['cargo']; ?>">
            
            <button type="submit">Atualizar Registro</button>
        </form>

        <hr>

        <h2>Deletar Registro</h2>
        <form action="deletar_funcionario.php" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este funcionário?');">
            <input type="hidden" name="id_func" value="<?php echo $row['id_func']; ?>">
            <button type="submit" class="delete-button">Deletar Funcionário</button>
        </form>
        
        <br>
        <a href="lista.php">← Voltar para Lista</a>
    </div>
</body>
</html>