<?php
$servername = "localhost";
$username = "root";
$password = "senaisp"; // Sua senha do XAMPP/MySQL
$dbname = "oficina_mecanica"; // O nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
// Definir charset para UTF-8 para evitar problemas com acentos
$conn->set_charset("utf8");
?>