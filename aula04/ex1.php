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

function exibircarro($marca_carro, $modelo_carro, $ano_carro, $revisao_carro, $numero_de_donos){
    echo " Marca: $marca_carro ";
    echo " Modelo: $modelo_carro ";
    echo " Ano: $ano_carro ";
    echo " Revisão Feita: " . ($revisao_carro ? "Sim " : "Não ");
    echo " Número de Donos: $numero_de_donos ";
}

exibircarro($marca_carro1, $modelo_carro1, $ano_carro1, $revisao_carro1, $numero_de_donos1);
?>