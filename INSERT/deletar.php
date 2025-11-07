<?php
$conn = new mysqli('localhost', 'root', 'senaisp', 'livraria'); 
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
};

$id = $_POST['id_usuario'];  

$stmt = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Usuario deletado com sucesso.";
}else {
    echo "Erro ao deletar:" . $stmt->error;
}
echo "<br><a href='lista.php'>Voltar para a lista</a>";

$stmt->close();
$conn->close();

?>

<link rel="stylesheet" href="style.css">