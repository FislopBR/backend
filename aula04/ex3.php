<?php
$marca_carro1 ="honda";
$modelo_carro1 = "civic";
$ano_carro1 = 2016;
$revisao_carro1 = true;
$numero_de_donos1 = 2;

$marca_carro2 ="BMW";
$modelo_carro2 = "320i";
$ano_carro2 = 2012;
$revisao_carro2 = false;
$numero_de_donos2 = 3;

$marca_carro3 ="fiat";
$modelo_carro3 = "uno";
$ano_carro3 = 2005;
$revisao_carro3 = false;
$numero_de_donos3 = 1;

$marca_carro4 ="volkswagen";
$modelo_carro4 = "jetta";
$ano_carro4 = 2020;
$revisao_carro4 = true;
$numero_de_donos4 = 7;

function precisarevisao($rev, $ano) {
    if ($rev == false && (2025 - $ano) > 2) {
        echo "O carro precisa de revisão.";
    } elseif ($rev == true) {
        echo "O carro já passou pela revisão.";
    } else {
        echo "informação inválida.";
    }
}

precisarevisao($revisao_carro2, $ano_carro2);
?>