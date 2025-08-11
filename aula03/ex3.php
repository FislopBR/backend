<?php
$numero_1_a_7 = 4;

switch ($numero_1_a_7) {
    case 1:
        echo "domingo";
        break;
    case 2: 
        echo "segunda-feira";
        break;
    case 3:
        echo "terça-feira";
        break;
    case 4:
        echo "quarta-feira";
        break; 
    case 5:
        echo "quinta-feira";
        break;
    case 6:
        echo "sexta-feira";
        break;
    case 7:
        echo "sábado";
        break;
    default:
        echo "Número inválido. Por favor, insira um número entre 1 e 7.";
        break;    
}
?>