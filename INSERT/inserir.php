<?php
$nome = $_POST['nome'];
$email = $_POST['email'];

$conn = new mysqli('localhost', 'root', 'senaisp', 'livraria');
$result = $conn->query("SELECT * FROM usuarios");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<br><a href='index.html'>Voltar</a>";

exit;
$conn->close();
?>
<link rel="stylesheet" href="style.css">
<a href="lista.html"><button type="button">lista de registro</button></a>