<?php
include 'db_connect.php';

$id = $_POST['id_os'];

// ATENÇÃO: Se a tabela 'ordem_de_servico' tiver chaves estrangeiras que apontam para ela (ex: tabela de peças_os),
// a exclusão pode falhar.
$sql = "DELETE FROM ordem_de_servico WHERE id_os = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() === TRUE) {
    echo "Ordem de Serviço deletada com sucesso!";
} else {
    echo "Erro ao deletar: " . $conn->error;
    echo "<br>(Pode ser que esta OS esteja associada a outras tabelas, como 'peca_os', e não pode ser deletada.)";
}

echo "<br><a href='lista.php'>Voltar para Lista</a>";

$stmt->close();
$conn->close();
?>