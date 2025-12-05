<?php
include 'db_connect.php';

// Pegar dados do POST
$id = $_POST['id_cliente'];
$nome = $_POST['nome_cli'];
$cpf = $_POST['cpf'];
$celular = $_POST['cell_cli'];
$endereco = $_POST['ende_cli'];

$sql = "UPDATE cliente SET nome_cli = ?, cpf = ?, ende_cli = ?, cell_cli = ? WHERE id_cliente = ?";
$stmt = $conn->prepare($sql);
// 'ssssi' -> 4 strings e 1 integer (o ID por último)
$stmt->bind_param("ssssi", $nome, $cpf, $endereco, $celular, $id);

if ($stmt->execute() === TRUE) {
    echo "Registro atualizado com sucesso!";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

echo "<br><a href='lista.php'>Voltar para Lista</a>";

$stmt->close();
$conn->close();
?>