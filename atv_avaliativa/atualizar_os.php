<?php
include 'db_connect.php';

// Pegar dados do POST
$id_os = $_POST['id_os'];
$id_cliente = $_POST['id_cliente'];
$id_carro = $_POST['id_carro'];
$desc_problema = $_POST['desc_problema'];
$status_os = $_POST['status_os'];
$prazo = $_POST['prazo'];
$valor_total = $_POST['valor_total'];

$sql = "UPDATE ordem_de_servico SET id_cliente = ?, id_carro = ?, desc_problema = ?, status_os = ?, prazo = ?, valor_total = ? WHERE id_os = ?";
$stmt = $conn->prepare($sql);
// 'iissdsi' -> integer, integer, string, string, date (string), decimal (double), integer
$stmt->bind_param("iissdsi", $id_cliente, $id_carro, $desc_problema, $status_os, $prazo, $valor_total, $id_os);

if ($stmt->execute() === TRUE) {
    echo "Ordem de Serviço atualizada com sucesso!";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

echo "<br><a href='lista.php'>Voltar para Lista</a>";

$stmt->close();
$conn->close();
?>