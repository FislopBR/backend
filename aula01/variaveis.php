<?php
/*1. Crie uma página PHP com duas variáveis $nome e $idade. Atribua a essas
variáveis o seu nome e a sua idade. Utilize um comando para escrever na tela a
mensagem:
“Eu sou NOME e tenho XX anos”.*/

echo"olá! \n";
$nome = "Filippo! \n";
$idade = 17;
$ano_atual = "2025";

$data_nasc= $ano_atual - $idade;
echo $nome,"vc nasceu em: ", $data_nasc;
?>

<?php
/*2. Dado uma frase “Programação em php.” transformá‐la em maiúscula, imprima,
depois em minúscula e imprima de novo.*/

$frase = "Programação em php.";
$frase = str_replace("ç","Ç", $frase);
echo "maiúscula: " . strtoupper($frase) . "\n";
$frase = str_replace("Ç","ç", $frase);
echo "minúscula: " . strtolower($frase) . "\n";

?>

<?php
/*3.Numa dada frase “O PHP foi criado em mil novecentos e noventa e cinco”.
- Trocar o “O” (letra) por “0”(zero), o “a” por “4” e o “i” por “1”.*/

$txt = "O PHP foi criado em mil novecentos e noventa e cinco.";
echo "\n", $txt;
$txt = str_replace([["O","o"],"i","a"],["0","1","4"],"$txt");
echo "\n", $txt;
?>