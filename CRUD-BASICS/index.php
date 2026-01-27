<?php
/**
 * Haal de inloggegevens op uit het bestand config.php
 */
include ('config/config.php');

/**
 * We gaan een data-scourenamestring maken waarin alle benodige gegevens
 * staan die nodig zijn om verbinding te maken met de database
 */
$dsn = "mysql:host=$dbHost;
          dbname=$dbName;
          charset=UTF8";
/**
 * Maak een nieuw PDO-Object zodat we een verbinding kunnen maken
 * met de mysql-server en database
 */

$pdo = new PDO($dsn, $dbUser, $dbPass);

/**
 * Maak een select-query die alle gegevens uit de tabel
 * HoogsteAchtbaanVanEuropa haalt. Sorteer op hoogte aflopend
 */

$sql = "SELECT HAVE.Id
              ,HAVE.Rollercoaster
              ,HAVE.AmusementPark
              ,HAVE.Country
              ,HAVE.Topspeed
              ,HAVE.Height
              ,DATE_FORMAT(HAVE.YearOfConstruction,'%d-%m-%Y') AS YOFC
        FROM rollercoaster AS HAVE
        ORDER BY HAVE.Height DESC";

/**
 * Met de method prepare van het PDO-Object maak je de sql-query
 * klaar voor het PDO-Object om uitgevoerd te worden. De geprepareerde
 * sql-query stoppen we in een variabele $statement
 */
$statement = $pdo->prepare($sql);

/**
 * We voeren nu de geprepareerde sql-query uit op de database
 */
$statement->execute();

/**
 * Haal de geselecteerde records binnen als een array van objecten
 * en stop deze in de variabele $result
 */
$result = $statement->fetchAll(PDO::FETCH_OBJ);

// Toon de geselecteerde data uit de database
//var_dump($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD-Basics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
     crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="container mt-3">

      <div class="row justify-content-center">
        <div class="col-10">
          <h2><u>Hoogste achtbanen van Europa</u></h2>
        </div>
      </div>

      <div class="row justify-content-center my-3">
        <div class="col-10"><h6>Nieuwe achtbaan <a href="./create.php"><i class="bi bi-plus-square text-danger"></i></a></h6></div>
         </div> 

      <div class="row justify-content-center mt-3">
        <div class="col-10">
          <table class="table table-striped table-hover">
            <thead>
              <th>Naam Achtbaan</th>
              <th>Naam Pretpark</th>
              <th>Land</th>
              <th>Topsnelheid (km/u)</th>
              <th>Hoogte (m)</th>
              <th>Bouwjaar</th>
              <th>Wijzig</th>
              <th>Verwijder</th>
            </thead>
            <tbody>
              <?php foreach ($result as $rollercoaster): ?>
              <tr>
                <td><?= $rollercoaster->Rollercoaster; ?></td>
                <td><?= $rollercoaster->AmusementPark; ?></td>
                <td><?= $rollercoaster->Country; ?></td>
                <td class="text-center"><?= $rollercoaster->Topspeed; ?></td>
                <td class="text-center"><?= $rollercoaster->Height; ?></td>
                <td><?= $rollercoaster->YOFC; ?></td>
                <td class="text-center">
                  <a href="update.php?id=<?= $rollercoaster->Id; ?>">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                </td>
                <td class="text-center">
                  <a href="delete.php?id=<?= $rollercoaster->Id; ?>">
                    <i class="bi bi-x-square text-danger"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    
    
  </body>
</html>