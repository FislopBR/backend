<?php
include 'db_connect.php';

// Pegar dados do POST
$id = $_POST['id_func'];
$nome = $_POST['nome_func'];
$cpf = $_POST['cpf'];
$celular = $_POST['cell_func'];
$cargo = $_POST['cargo'];

$sql = "UPDATE funcionario SET nome_func = ?, cpf = ?, cell_func = ?, cargo = ? WHERE id_func = ?";
$stmt = $conn->prepare($sql);
// 'ssssi' -> 4 strings (nome, cpf, celular, cargo) e 1 integer (ID)
$stmt->bind_param("ssssi", $nome, $cpf, $celular, $cargo, $id);

if ($stmt->execute() === TRUE) {
    echo "Registro de funcionário atualizado com sucesso!";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

echo "<br><a href='lista.php'>Voltar para Lista</a>";

$stmt->close();
$conn->close();
?>