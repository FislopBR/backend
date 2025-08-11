<?php

for ($i = 0; $i < 5; $i++) {
    echo "Menu:\n";
    echo "1 - Olá\n";
    echo "2 - Data atual\n";
    echo "3 - Sair\n";
    echo "Escolha uma opção: ";
    $opcao = readline(("escolha uma opção: "));

    switch ($opcao) {
        case '1':
            echo "Olá, usuário!\n\n";
            break;
        case '2':
            echo "Data atual: 11/08/2025" . "\n\n";
            break;
        case '3':
            echo "Saindo do programa...\n";
            exit;
        default:
            echo "Opção inválida!\n\n";
            break;
    }
}
echo "Fim das tentativas.\n";