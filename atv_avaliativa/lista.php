<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Registros - Oficina</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="index.html">← Voltar para Home</a>
        
        <h2>Ordens de Serviço</h2>
        <table>
            <thead>
                <tr>
                    <th>ID OS</th>
                    <th>Status</th>
                    <th>Prazo</th>
                    <th>Veículo (Placa)</th>
                    <th>Cliente (Nome)</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connect.php';
                // Query com JOIN para buscar nomes e placa
                $sql_os = "SELECT os.id_os, os.status_os, os.prazo, c.placa, cli.nome_cli
                           FROM ordem_de_servico AS os
                           JOIN carro AS c ON os.id_carro = c.id_carro
                           JOIN cliente AS cli ON os.id_cliente = cli.id_cliente";
                $result_os = $conn->query($sql_os);

                if ($result_os->num_rows > 0) {
                    while($row = $result_os->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_os']}</td>
                                <td>{$row['status_os']}</td>
                                <td>{$row['prazo']}</td>
                                <td>{$row['placa']}</td>
                                <td>{$row['nome_cli']}</td>
                                <td><a href='editar_os.php?id={$row['id_os']}'>Editar/Deletar</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhuma Ordem de Serviço encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Clientes Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_cli = "SELECT id_cliente, nome_cli, cpf, cell_cli FROM cliente";
                $result_cli = $conn->query($sql_cli);
                if ($result_cli->num_rows > 0) {
                    while($row = $result_cli->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_cliente']}</td>
                                <td>{$row['nome_cli']}</td>
                                <td>{$row['cpf']}</td>
                                <td>{$row['cell_cli']}</td>
                                <td><a href='editar_cliente.php?id={$row['id_cliente']}'>Editar/Deletar</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum cliente encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Funcionários Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Cargo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_func = "SELECT id_func, nome_func, cpf, cargo FROM funcionario";
                $result_func = $conn->query($sql_func);
                if ($result_func->num_rows > 0) {
                    while($row = $result_func->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_func']}</td>
                                <td>{$row['nome_func']}</td>
                                <td>{$row['cpf']}</td>
                                <td>{$row['cargo']}</td>
                                <td><a href='editar_funcionario.php?id={$row['id_func']}'>Editar/Deletar</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum funcionário encontrado.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>