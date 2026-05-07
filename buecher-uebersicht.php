<!DOCTYPE html>
<html>
    <head>
        <title>Bücher Übersicht</title>
        <link rel="stylesheet" href="tablestyle.css">
    </head>
    <body>
        <?php include "menu.html" ?>
        <p>Unsere Bücher</p>
        <input type="text" name="suche" value="Suche...">
    <br>
    <table border="1" style="border-collapse: collapse;">
    <br>
    <tr>
    <th>ISBN</th>
    <th>Titel</th>
    <th>Autor*in</th>
    <th>Auflage</th>
    <th>Erscheinungsjahr</th>
    <th>Verlag</th>
    <th>Status</th>
    </tr>

    
<?php
$config = require '/etc/pilibrary/config.php';
$dbPassword = $config['db_password'];
//Aktiverit Fehleranzeige
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Optionen fpr PDO-funktion
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, // wirft Exceptions bei DB‑Fehlern
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,  // fetch() gibt Arrays ohne Indexzahlen zurück
];

//Erstellt DPO Objekt
$pdo = new PDO('mysql:host=localhost;dbname=PiLibrary', 'data-admin', $dbPassword, $options);

//Zeigt Inhalte der Tabelle "Buecher" als grafische Tabelle an
$data = $pdo->query("SELECT * FROM Buecher");
while ($row = $data->fetch()) {
    // Status umwandeln
    if ($row['Ausleihstatus'] === "1") {
        $statusSymbol = "✔️";   // Haken
    } elseif ($row['Ausleihstatus'] === "e0") {
        $statusSymbol = "❌";   // X
    } else {
        $statusSymbol = "";     // Falls etwas anderes drinsteht
    }
    echo "<tr><td>". $row['ISBN'] ."</td><td>". $row['Name'] ."</td><td>". $row['Autor'] ."</td><td>". $row['Auflage'] ."</td><td>". $row['Erscheinungsjahr'] ."</td><td>". $row['Verlag'] ."</td><td>". $statusSymbol ."</td></tr>";
}
?>


    </table>
    </body>
</html>