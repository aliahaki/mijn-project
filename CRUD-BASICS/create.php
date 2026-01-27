<?php
if (isset($_POST['submit'])) {

    /**
     * De inloggegevens van de gebruiker van de database binnenhalen
     */
    include ('config/config.php');

    /**
     * We gaan gebruikmaken van PDO (PHP-DataObjects) en die wil de
     * inloggegevens in een dsn-string (data-sourcenamestring) hebben
     */
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
     /**
      * Maak een nieuw PDO-object zodat we verbinding hebben met onze database
      */
    $pdo = new PDO($dsn, $dbUser, $dbPass);


    /**
     * we gaan de $_POST waarden schoonmaken met de functie
     * filter_input_array. Deze functie filtert de waarden van een
     * array met de opgegeven filter. In dit geval FILTER_SANITIZE_STRING
     */
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    /**
     * Maak een insert-query die de gegevens uit het formulier in de tabel zet
     * van de database
     */
    // Opdrachtje maak een insert-query...
    $sql = "INSERT INTO rollercoaster
            (
                  Rollercoaster
                 ,AmusementPark
                 ,Country
                 ,Topspeed
                 ,Height
                 ,YearOfConstruction
            )
            VALUES
            (
                  :rollercoaster
                 ,:amusementpark
                 ,:country
                 ,:topspeed
                 ,:height
                 ,:yearofconstruction
            )";


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

    /**
     * Voer de geprepareerde sql-query uit
     */
    $statement->execute();

    /**
     * Geef een melding dat de gegevens zijn toegevoegd
    */
    $display = 'flex';

    header('Refresh:3; index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoogste Achtbanen</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
     rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
     crossorigin="anonymous">
     <link rel="stylesheet" 
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
  <body>
    <div class="container mt-3">

        <div class="row justify-content-center" style="display: <?= $display ?? 'none'; ?>">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    De gegevens zijn toegevoegd. U wordt teruggestuurd naar de index-pagina.
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-6"><h3 class="text-primary">Voer een nieuwe achtbaan in</h3></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <form action="create.php" method="post">
                    <div class="mb-3">
                        <label for="inpuntNaamAchtbaan" class="form-label">Naam Achtbaan</label>
                        <input name="naamAchtbaan" placeholder="Vul de naam van de achtbaan in" type="text" class="form-control" id="inpuntNaamAchtbaan"
                                    value="<?= $_POST['naamAchtbaan'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntNaamPretpark" class="form-label">Naam Pretpark</label>
                        <input name="naamPretpark" placeholder="Vul de naam van de achtbaan in" type="text" class="form-control" id="inpuntNaamPretpark"
                                    value="<?= $_POST['naamPretpark'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntLand" class="form-label">Land</label>
                        <input name="land" placeholder="Vul de naam het land in" type="text" class="form-control" id="inpuntLand"
                                    value="<?= $_POST['land'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntTopsnelheid" class="form-label">Topsnelheid:</label>
                        <input name="topsnelheid" placeholder="Vul de topsnelheid in" type="number" min="0" max="255" class="form-control" id="inpuntTopsnelheid"
                                    value="<?= $_POST['topsnelheid'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntHoogte" class="form-label">Hoogte:</label>
                        <input name="hoogte" placeholder="Vul de hoogte in" type="number" min="0" max="255" class="form-control" id="inpuntHoogte"
                                    value="<?= $_POST['hoogte'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inpuntYearOfconstruction" class="form-label">Bouwjaar:</label>
                        <input name="bouwjaar" placeholder="Vul het bouwjaar in" type="date" min="0" max="255" class="form-control" id="inpuntYearOfconstruction"
                                    value="<?= $_POST['bouwjaar'] ?? '' ?>">
                    </div>
                    <div class="d-grid gap-2">
                        <button name="submit" type="submit" class="btn btn-primary btn-lg mt-2">Verstuur</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <a href="index.php">
                    <i class="bi bi-arrow-left-square-fill text-danger" style="font-size:1.5em"></i>
                </a>
            </div>
        </div>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" 
            integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" 
            crossorigin="anonymous">
    </script>
  </body>
</html>