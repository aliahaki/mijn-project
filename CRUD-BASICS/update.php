<?php
/**
 * Haal de inloggegevens op uit het bestand config.php
 */
include('config/config.php');

/**
 * We gaan een data-scourenamestring maken waarin alle benodige gegevens
 * staan die nodig zijn om een verbinding te maken met de database
 */
$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";

/**
 * Maak een nieuw PDO-Object zodat we een verbinding kunnen maken
 * met de mysql-server en database
 */
$pdo = new PDO($dsn, $dbUser, $dbPass);

if (isset($_POST['submit'])) {
    // Er is gedrukt op de submit-knop

    /**
        *  We gaan de $_POST waarden schoonmaken met de functie
        *  filter_input aaray. Deze functie filtert de waarden van een
        *  aaray met de opgegeven filter. In dit geval FILTER_SANITIZE_STRING
        */

} else {
    //  We komen op de update-pagina en er is nog niet op de submit-knop gedrukt
    
    /**
     * Maak een select-query die alle gegevens uit de tabel
     * HoogsteAchtbaanVanEuropa haalt.
     */
    $sql = "SELECT  HAVE.Id
                    ,HAVE.Rollercoaster
                    ,HAVE.AmusementPark
                    ,HAVE.Country
                    ,HAVE.Topspeed
                    ,HAVE.Height
                    ,HAVE.YearOfConstruction
            FROM rollercoaster AS HAVE
            WHERE HAVE.Id = :id";

/**
 * Met de method prepare van het PDO-Object maak je de sql-query klaar voor het PDO-Object
 * om uitgevoerd te worden. De geprepareerde sql-query stoppen we in een variabele $statement
 */
$statement = $pdo->prepare($sql);

/**
 * Koppel de id aan de query
 */
$statement->bindValue(':id', $_GET['id'], PDO ::PARAM_INT);

/**
 * We voeren nu de geprepareerde sql-query uit op de database
 */
$statement->execute();


/**
 * Haal de geselecteerde records binnen als een array van objecten
 * en stop deze in de variabele $result
 */
$result = $statement->fetch(PDO::FETCH_OBJ);

// Toon de geselecteerde data uit de database
var_dump($result);
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
    crossorigin="anonymous">
  </head>
  <body>

   <div class="container mt-3">

       <!-- Titel van de pagina -->
      <div class="row justify-content-center">
         <div class="col-6"><h3 class="text-primary">Wijzig de achtbaangegevens:</h3></div>
       </div>

       <!-- het update formulier -->
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="update.php" method="post">
                    <div class="mb-3">
                        <label for="inpuntNaamAchtbaan" class="form-label">Naam Achtbaan</label>
                        <input name="naamAchtbaan" placeholder="Vul de naam van de achtbaan in" type="text" class="form-control" id="inpuntNaamAchtbaan" 
                                 value="<?= $result->Rollercoaster ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntNaamPretpark" class="form-label">Naam Pretpark</label>
                        <input name="naamPretpark" placeholder="Vul de naam van de achtbaan in" type="text" class="form-control" id="inpuntNaamPretpark"
                                 value="<?= $result->AmusementPark ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntLand" class="form-label">Land</label>
                        <input name="land" placeholder="Vul de naam het land in" type="text" class="form-control" id="inpuntLand"
                                    value="<?= $result->Country ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntTopsnelheid" class="form-label">Topsnelheid:</label>
                        <input name="topsnelheid" placeholder="Vul de topsnelheid in" type="number" min="0" max="255" class="form-control" id="inpuntTopsnelheid"
                                    value="<?= $result->Topspeed ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntHoogte" class="form-label">Hoogte:</label>
                        <input name="hoogte" placeholder="Vul de hoogte in" type="number" min="0" max="255" class="form-control" id="inpuntHoogte"
                                    value="<?= $result->Height ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntYearOfconstruction" class="form-label">Bouwjaar:</label>
                        <input name="bouwjaar" placeholder="Vul het bouwjaar in" type="date" min="0" max="255" class="form-control" id="inpuntYearOfconstruction"
                                    value="<?= $result->YearOfConstruction ?? '' ?>">
                    </div>
                    <div class="d-grid gap-2">
                        <button name="submit" type="submit" class="btn btn-primary btn-lg mt-2">Verstuur</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
     crossorigin="anonymous"></script>
  </body>
</html>