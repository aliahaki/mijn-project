<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>lesweek 2</title>

</head>
<body>
    <!-- Ik vind de tekst hieronder een beetje klein -->
   <h2>Tekst en commentaar weergeven met php in de browser</h2>


   <?php
       //Hieronder staat een variabele
       echo"<p> Mijn voornaam is: Alia</p> " ;

       # Op deze manier kun je de inhoud van een variabel weergeven
       $achternaam = "Haki";

       echo "<p>Mijn achternaam is:" . $achternaam. "</p>";

       /*
          Dit is een  manier om commentaar
          toe te voegen over meerdere regels
      */

    
       $straatnaam = 'Wulverhorst';
       /**
        * Dit heet een doc-block commentaar.
        * Je kunt meerdere regels commentaar geven
        */

       echo "<p>Straatnaam:  $straatnaam </P>";

    

       $getal1 = 144;

       $getal2 = 2;

       $som = $getal1 + $getal2;
       $verschil = $getal1 - $getal2;
       $vermenigvuldigen = $getal1 * $getal2;
       $delen = $getal1 / $getal2;
       $macht = $getal1 ** $getal2;
       $wortel = sqrt($getal1);

       

       echo "<p>De som van $getal1 + $getal2 = $som</p>";
       echo "<p>Het verschil van $getal1 - $getal2 = $verschil</p>";
       echo "<p>Het vermenigvuldigen van $getal1 * $getal2 = $vermenigvuldigen</p>";
       echo "<p>Het delen van $getal1 / $getal2 = $delen</p>";
       echo "<p>De macht van $getal1 ** $getal2 = $macht</p>";
       echo "<p> De wortel van $getal1 = $wortel</p>";

       // delen / , vermenigvuldigen *, verschil -, machverheffen is **

       


   ?>

   
</body>
</html>
