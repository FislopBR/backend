<?php
include 'db_connect.php';

$id = $_POST['id_cliente'];

// ATENÇÃO: Você não pode deletar um cliente se ele tiver carros ou ordens de serviço (erro de chave estrangeira)
// Você precisa primeiro deletar as OS, depois os carros, depois o cliente.
// Por segurança, este código simples pode falhar se o cliente estiver em uso.

$sql = "DELETE FROM cliente WHERE id_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() === TRUE) {
    echo "Cliente deletado com sucesso!";
} else {
    echo "Erro ao deletar: " . $conn->error;
    echo "<br>(Pode ser que este cliente esteja associado a um carro ou OS e não pode ser deletado.)";
}

echo "<br><a href='lista.php'>Voltar para Lista</a>";

$stmt->close();
$conn->close();
?>