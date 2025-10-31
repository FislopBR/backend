<?php
$nome = $_POST['nome'];
$email = $_POST['email'];

$conn = new mysqli('localhost', 'root', 'senaisp', 'livraria');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// header("Location: index.html");
exit;
$conn->close();
?>