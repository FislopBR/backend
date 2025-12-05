<?php
include 'db_connect.php';
$id = $_GET['id']; // Pega o ID da URL

// Busca os dados atuais do cliente
$sql = "SELECT * FROM cliente WHERE id_cliente = ?";
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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Cliente: <?php echo $row['nome_cli']; ?></h2>
        
        <form action="atualizar_cliente.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">
            
            <label>Nome:</label>
            <input type="text" name="nome_cli" value="<?php echo $row['nome_cli']; ?>" required>
            
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?php echo $row['cpf']; ?>" required>
            
            <label>Telefone:</label>
            <input type="text" name="cell_cli" value="<?php echo $row['cell_cli']; ?>">
            
            <label>Endereço:</label>
            <input type="text" name="ende_cli" value="<?php echo $row['ende_cli']; ?>">
            
            <button type="submit">Atualizar Registro</button>
        </form>

        <hr>

        <h2>Deletar Registro</h2>
        <form action="deletar_cliente.php" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este cliente?');">
            <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">
            <button type="submit" class="delete-button">Deletar Cliente</button>
        </form>
        
        <br>
        <a href="lista.php">← Voltar para Lista</a>
    </div>
</body>
</html>