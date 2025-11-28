<?php
include 'db_connect.php';

// Pegar dados do POST
$nome = $_POST['nome_func'];
$cpf = $_POST['cpf'];
$celular = $_POST['cell_func'];
$cargo = $_POST['cargo'];

// Usar Prepared Statements para segurança
$sql = "INSERT INTO funcionario (nome_func, cpf, cell_func, cargo) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
// 'ssss' significa que estamos passando 4 strings
$stmt->bind_param("ssss", $nome, $cpf, $celular, $cargo);

if ($stmt->execute() === TRUE) {
    echo "Novo funcionário cadastrado com sucesso! ✅";
} else {
    echo "Erro ao cadastrar funcionário: " . $conn->error;
}

echo "<br><a href='cadastro.html'>Voltar aos Cadastros</a>";
echo "<br><a href='index.html'>Voltar para Home</a>";

$stmt->close();
$conn->close();
?>