<?php
include 'db_connect.php';

$id = $_POST['id_func'];

$sql = "DELETE FROM funcionario WHERE id_func = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() === TRUE) {
    echo "Funcionário deletado com sucesso!";
} else {
    echo "Erro ao deletar: " . $conn->error;
}

echo "<br><a href='lista.php'>Voltar para Lista</a>";

$stmt->close();
$conn->close();
?>