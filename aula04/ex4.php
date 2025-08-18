<?php
$marca_carro1 ="honda";
$modelo_carro1 = "civic";
$ano_carro1 = 2016;
$revisao_carro1 = true;
$numero_de_donos1 = 2;

$marca_carro2 ="bmw";
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

function calcularValor($marca, $ano, $Ndonos) {
    $preco_base = 50000;

    switch ($marca) {
        case 'honda':
            $preco_base = 60000;
            break;
        case 'bmw':
            $preco_base = 200000;
            break;
        case 'fiat':
            $preco_base = 15000;
            break;
        case 'volkswagen':
            $preco_base = 80000;
            break;
    }

    $ano_atual = 2025;
    $anos_uso = $ano_atual - $ano;
    $preco = $preco_base - ($anos_uso * 3000);

    if ($Ndonos > 1) {
        $preco *= pow(0.95, $Ndonos - 1);
    }

    return max($preco, 0);
}

echo calcularValor($marca_carro1, $ano_carro1, $numero_de_donos1);
?>