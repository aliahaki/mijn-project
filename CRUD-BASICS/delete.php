<?php
/**
 * Inloggegevens ophalen uit de configuratie
 */
include('config/config.php');

/**
 * We gaan gebruikmaken van PDO (PHP Data Objects) en die wil de 
 * inloggevens in een dsn-string (data-sourcenamestring) hebben
 */
$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";

/**
 * Maak een nieuw PDO-object om gegevens te kunnen deleten
 */
$pdo = new PDO($dsn, $dbUser, $dbPass);

/**
 * Maak een delete-query die de gegevens uit de tabel verwijderd
    */  
$sql = "DELETE FROM Rollercoaster
        WHERE Id = :id";
 
/**
 * Bereidt de sql-query voor voor uitvoering in PDO
 */
$statement = $pdo->prepare($sql);

/**
 * Koppel de id aan de query
 */
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

/**
 * Voer nu de gepreparde sql-query uit de database
 */
$statement->execute();

/**
 * Stuur de gebruiker terug naar de index.php
 */
header('Refresh: 3; url=index.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD met PHP en MYSQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
           rel="stylesheet"
           integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
           crossorigin="anonymous">
 </head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="alert alert-success text-center" role="alert">
                    De gegevens zijn verwijderd. U wordt teruggestuurd naar de index-pagina.
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" 
    integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" 
    crossorigin="anonymous"></script>
 
</body>
</html>