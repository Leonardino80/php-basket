<!-- Il software deve generare casualmente le statistiche di gioco di
100 giocatori di basket per una giornata di campionato.
In particolare vanno generate per ogni giocatore le seguenti
informazioni, facendo attenzione che il numero generato abbia
senso:
- Codice Giocatore Univoco (formato da 3 lettere
maiuscole casuali e 3 numeri)
- Numero di punti fatti
- Numero di rimbalzi
- Falli
- Percentuale di successo per tiri da 2 punti
- Percentuale di successo per tiri da 3 punti -->
<?php

// funzione per ottenere una lettera casuale
function lettera_a_caso() {
 $alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 $lettera_casuale  = substr( $alfabeto, rand(1,24) );
 return $lettera_casuale;
}

// funzione per ottenere le statistiche del giocatore
function statistiche_giocatori(){
  $codice_giocatore_univoco = $lettera_casuale.$lettera_casuale.$lettera_casuale.rand(100, 999);
  $punti_fatti = rand(1, 100);
  $rimbalzi= rand(1, 100);
  $falli = rand(1, 100);
  $percentuale =rand(1, 100);
  $tiri_da_2 = $randomPoints * $percentuale / 100;
  $tiri_da_3 = $randomPoints * (100-$percentuale) / 100;
  $statistiche = [
    [
     "id" => $codice_giocatore_univoco,
     "punti_" => $punti_fatti,
     "rimbalzi" => $rimbalzi,
     "falli" => $falli,
     "tiri_due" => $tiri_da_2,
     "tiri_tre" => $tiri_da_3
    ]
  ];
 return $statistiche;
}

// ciclo per ottenere i 100 giocatori
$giocatori = [];
for ($i=0; $i < 100 ; $i++) {
 $giocatori[] = statistiche_giocatori();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>basket</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- Contenitore cards -->
    <div class="container">
      <!-- Stampo i 100 giocatori -->
      <?php foreach ($giocatori as $key => $value) { ?>
      <div class="giocatore">
        <h2>Codice giocatore univoco <span><?php echo($value['id']) ?></span></h2>
        <h2>Punti: <span><?php echo($value['punti']) ?></span></h2>
        <h2>Rimbalzi: <span><?php echo($value['rimbalzi']) ?></span></h2>
        <h2>Falli: <span><?php echo($value['falli']) ?></span></h2>
        <h2>Tiri da 2: <span><?php echo($value['tiri_due']) ?>%</span></h2>
        <h2>Tiri da 3: <span><?php echo($value['tiri_tre']) ?>%</span></h2>
      </div>
      <!-- fine giocatore -->
      <?php
      } // fine del ciclo
      ?>
    </div>
    <!-- fine container -->
  </body>
</html>
