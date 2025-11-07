<?php
$conn = new mysqli('localhost', 'root', 'senaisp', 'livraria');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM usuarios WHERE id_usuario = $id");
$row = $result->fetch_assoc();
?>

<form action="atualizar.php" method="post">
    <input type="hiddem" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
    nome: <input type="text" name="nome" value="<?php echo $row['nome'];?>"><br>
    email: <input type="email" name="email" value="<?php echo $row['email'];?>"><br>
    <input type="submit" value="Atualizar">
</form>

<form action="deletar.php" method="post">
    <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
    <input type="submit" value="Deletar">
</form>

<link rel="stylesheet" href="style.css">