<?php
include 'db_connect.php';
$id = $_GET['id']; // Pega o ID da URL

// Busca os dados atuais da Ordem de Serviço. O DATE_FORMAT garante que o campo 'prazo' venha no formato YYYY-MM-DD para o input type="date".
$sql = "SELECT id_os, id_cliente, id_carro, desc_problema, status_os, DATE_FORMAT(prazo, '%Y-%m-%d') AS prazo, valor_total FROM ordem_de_servico WHERE id_os = ?";
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
    <title>Editar Ordem de Serviço</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Ordem de Serviço #<?php echo $row['id_os']; ?></h2>
        
        <form action="atualizar_os.php" method="POST">
            <input type="hidden" name="id_os" value="<?php echo $row['id_os']; ?>">
            
            <label>ID do Cliente:</label>
            <input type="number" name="id_cliente" value="<?php echo $row['id_cliente']; ?>" required>
            
            <label>ID do Carro:</label>
            <input type="number" name="id_carro" value="<?php echo $row['id_carro']; ?>" required>
            
            <label>Descrição do Problema:</label>
            <textarea name="desc_problema" required><?php echo $row['desc_problema']; ?></textarea>
            
            <label>Status:</label>
            <input type="text" name="status_os" value="<?php echo $row['status_os']; ?>" required>

            <label>Prazo:</label>
            <input type="date" name="prazo" value="<?php echo $row['prazo']; ?>">

            <label>Valor Total (R$):</label>
            <input type="number" step="0.01" name="valor_total" value="<?php echo $row['valor_total']; ?>">
            
            <button type="submit">Atualizar OS</button>
        </form>

        <hr>

        <h2>Deletar Registro</h2>
        <form action="deletar_os.php" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar esta Ordem de Serviço?');">
            <input type="hidden" name="id_os" value="<?php echo $row['id_os']; ?>">
            <button type="submit" class="delete-button">Deletar OS</button>
        </form>
        
        <br>
        <a href="lista.php">← Voltar para Lista</a>
    </div>
</body>
</html>