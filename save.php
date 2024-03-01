<?php

$arquivo = fopen("teste.txt", "a+");

$nome = "Felipe";

fwrite($arquivo, $nome);

echo file_get_contents("teste.txt", true);

fclose($arquivo);