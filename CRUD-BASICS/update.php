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
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
    /**
     * Maak een insert-query die de gegevens uit het formulier in de tabel zet
     * van de database
     */
    $sql = "UPDATE rollercoaster AS HAVE
            SET    Rollercoaster = :rollercoaster
                  ,AmusementPark = :amusementpark
                  ,Country = :country
                  ,Topspeed = :topspeed
                  ,Height = :height
                  ,YearOfConstruction = :yearofconstruction
                WHERE HAVE.Id = :id";

    /**
     * Bereidt de sql-query voor voor uitvoering in PDO
     */
    $statement = $pdo->prepare($sql);

    $statement->bindValue(':rollercoaster', $_POST['naamAchtbaan'], PDO::PARAM_STR);
    $statement->bindValue(':amusementpark', $_POST['naamPretpark'], PDO::PARAM_STR);
    $statement->bindValue(':country', $_POST['land'], PDO::PARAM_STR);
    $statement->bindValue(':topspeed', $_POST['topsnelheid'], PDO::PARAM_INT);
    $statement->bindValue(':height', $_POST['hoogte'], PDO::PARAM_INT);
    $statement->bindValue(':yearofconstruction', $_POST['bouwjaar'], PDO::PARAM_STR);
    $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

    /**
     * Voer de geprepareerde sql-query uit
     */
    $statement->execute();

    /**
     * Zet een melding naar de gebruiker dat de update is gelukt
     */
    $display = 'flex';

    /**
     * Stuur de gebruiker terug naar de index.php pagina
     */
    header('Refresh:3; index.php');

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
//var_dump($result);
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

       <!--Melding naar de gebruiker dat de update is gelukt-->
         <div class="row justify-content-center" style="display:<?= $display ?? 'none'; ?>">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    De gegevens zijn gewijzigd. U wordt teruggestuurd naar de index-pagina.
                </div>
            </div>
        </div>

       <!-- het update formulier -->
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="update.php" method="post">
                    <div class="mb-3">
                        <label for="inpuntNaamAchtbaan" class="form-label">Naam Achtbaan</label>
                        <input name="naamAchtbaan" placeholder="Vul de naam van de achtbaan in" type="text" class="form-control" id="inpuntNaamAchtbaan" 
                                 value="<?= $result->Rollercoaster ?? $_POST['naamAchtbaan'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntNaamPretpark" class="form-label">Naam Pretpark</label>
                        <input name="naamPretpark" placeholder="Vul de naam van de achtbaan in" type="text" class="form-control" id="inpuntNaamPretpark"
                                 value="<?= $result->AmusementPark ?? $_POST['naamPretpark'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntLand" class="form-label">Land</label>
                        <input name="land" placeholder="Vul de naam het land in" type="text" class="form-control" id="inpuntLand"
                                    value="<?= $result->Country ?? $_POST['land'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntTopsnelheid" class="form-label">Topsnelheid:</label>
                        <input name="topsnelheid" placeholder="Vul de topsnelheid in" type="number" min="0" max="255" class="form-control" id="inpuntTopsnelheid"
                                    value="<?= $result->Topspeed ?? $_POST['topsnelheid'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntHoogte" class="form-label">Hoogte:</label>
                        <input name="hoogte" placeholder="Vul de hoogte in" type="number" min="0" max="255" class="form-control" id="inpuntHoogte"
                                    value="<?= $result->Height ?? $_POST['hoogte'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntYearOfconstruction" class="form-label">Bouwjaar:</label>
                        <input name="bouwjaar" placeholder="Vul het bouwjaar in" type="date" min="0" max="255" class="form-control" id="inpuntYearOfconstruction"
                                    value="<?= $result->YearOfConstruction ?? $_POST['bouwjaar'] ?>">
                    </div>

                    <input name="id" type="hidden" value="<?= $result->Id ?? $_POST['id'] ?>">
                     
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