<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Point do Açaí</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Protest+Revolution&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<?php

if(isset($_GET['valorpeso']) && isset($_GET['peso'])){

  $valorpeso = $_GET['valorpeso'];
  $peso = $_GET['peso'];
  
  $valorpago = $valorpeso * $peso;


  $dia = date('d');
  $mes = date('m');
  $ano = date('Y');

  $dado = "$dia/$mes/$ano - R$" . number_format($valorpago, 2, ',', '.')."\n<br>";

  $arquivo = fopen("caixa.txt", "a+");
  
  fwrite($arquivo, $dado);
  fclose($arquivo);

}


?>


  <div>
    <img src="images/logo.png" alt="logo">
    <main>
      <div class="borda esquerda">
        <form action="index.php" method="GET">
          <label for="Valor do peso">Valor do peso</label>
          <input type="number" name="valorpeso">

          <label for="peso">Peso</label>
          <input type="number" step="0.1"name="peso">

          <label for="Valor a ser pago">Valor a ser pago</label>
          <label>
            <?php 
          
          if(isset($_GET['valorpeso']) && isset($_GET['peso'])){
            echo number_format($valorpago, 2, ',', '.');
          }else {
            echo "0,00";
          } ; 

          ?>
          </label>
          <button>Calcular</button>
        </form>  

      </div>
      <div class="borda direita">
        <p style="text-align: center; font-size: 2rem;">Caixa</p>
        <?php
        
        echo file_get_contents("caixa.txt", true);

        ?>
      </div>
    </main>
  </div>
</body>
</html>