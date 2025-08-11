<?php
$num1 = 4;
$num2 = 5;
$operacoes = "+";

switch ($operacoes) {
    case "+":
        echo $num1 + $num2;
        break;
    case "-":
        echo $num1 - $num2;
        break;
    case "*":
        echo $num1 * $num2;
        break;
    case "/":
        if ($num2 != 0) {
            echo $num1 / $num2;
        } else {
            echo "Divisão por zero não é permitida.";
        }
        break;
    default:
        echo "Operação inválida.";
        break;
}
?>