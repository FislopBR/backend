<?php

$conn = new mysqli('localhost', 'root', 'senaisp', 'livraria'); 

$id = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id_usuario='$id'";

if ($conn->query($sql) === true) {
    echo "Dados atualizados com sucesso.";
    echo "<br><a href='index.html'>voltar</a>";
} else {
    echo "Erro" . $conn->error;
}

$conn->close();

?>

<link rel="stylesheet" href="style.css">