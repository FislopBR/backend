<?php
include 'db_connect.php';


$nome = $_POST['nome_cli'];
$cpf = $_POST['cpf'];
$ende_cli = $_POST['ende_cli'];
$cell_cli = $_POST['cell_cli'];


$sql = "INSERT INTO cliente (nome_cli, cpf, ende_cli, cell_cli) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ssss", $nome, $cpf, $ende_cli, $cell_cli);

if ($stmt->execute() === TRUE) {
    echo "Novo cliente cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

echo "<br><a href='cadastro.html'>Voltar aos Cadastros</a>";
echo "<br><a href='index.html'>Voltar para Home</a>";

$stmt->close();
$conn->close();
?>