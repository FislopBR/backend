<?php
$tempera = readline(("Digite a temperatura em Celsius: "));
if ($tempera <= 15) {
    echo "Frio";
}elseif ($tempera >= 25) {
    echo "Qunente";
}else{
    echo "Agradável";
}
?>