<?php
include 'db_connect.php';

// Pegar dados do POST
$id_cliente = $_POST['id_cliente'];
$id_carro = $_POST['id_carro'];
$desc_problema = $_POST['desc_problema'];
$status_os = $_POST['status_os'];

// Trata o campo 'prazo'
$prazo = $_POST['prazo'];
// O valor total assume 0.00 se estiver vazio
$valor_total = isset($_POST['valor_total']) && $_POST['valor_total'] !== '' ? $_POST['valor_total'] : 0.00;

// Construção Dinâmica do SQL para resolver o erro do NULL/DATE no bind_param

// 1. Inicializa as colunas e placeholders com os campos NOT NULL ou que são sempre passados.
$sql_cols = "id_cliente, id_carro, desc_problema, status_os, valor_total";
$sql_placeholders = "?, ?, ?, ?, ?";
$tipos = "iissd"; // i(int), i(int), s(string), s(string), d(decimal)
$parametros = [&$id_cliente, &$id_carro, &$desc_problema, &$status_os, &$valor_total];

if (!empty($prazo)) {
    // 2. Se a data FOI preenchida, adiciona ao SQL e aos parâmetros (usando 's' para string)
    $sql_cols .= ", prazo";
    $sql_placeholders .= ", ?";
    $tipos .= "s";
    $parametros[] = &$prazo;
} else {
    // 3. Se a data NÃO foi preenchida (está vazia), adiciona a palavra-chave NULL diretamente no SQL.
    $sql_cols .= ", prazo";
    $sql_placeholders .= ", NULL"; // Injeta o NULL do SQL diretamente
}

// Monta a query final
$sql = "INSERT INTO ordem_de_servico ($sql_cols) VALUES ($sql_placeholders)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

// O bind_param precisa dos tipos e dos parâmetros, mas apenas para os placeholders '?'
if (!empty($prazo)) {
    // Se a data foi preenchida, usamos todos os parâmetros e tipos
    // Usamos call_user_func_array pois bind_param não aceita array diretamente.
    call_user_func_array(array($stmt, 'bind_param'), array_merge([$tipos], $parametros));
} else {
    // Se a data NÃO foi preenchida, removemos o último tipo ('s') e parâmetro ($prazo)
    // para que a contagem bata com os placeholders '?' que restaram.
    $tipos_sem_prazo = substr($tipos, 0, -1);
    array_pop($parametros); // Remove $prazo
    call_user_func_array(array($stmt, 'bind_param'), array_merge([$tipos_sem_prazo], $parametros));
}


if ($stmt->execute() === TRUE) {
    echo "Nova Ordem de Serviço cadastrada com sucesso! 📝";
} else {
    echo "Erro ao cadastrar Ordem de Serviço: " . $conn->error;
    echo "<br>Verifique se o ID do Cliente e o ID do Carro estão corretos e existem no banco de dados.";
    echo "<br>Detalhe do erro: " . $stmt->error;
}

echo "<br><a href='cadastro.html'>Voltar aos Cadastros</a>";
echo "<br><a href='index.html'>Voltar para Home</a>";

$stmt->close();
$conn->close();
?>