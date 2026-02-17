<!DOCTYPE html>
<html>
    <head>
        <title>Bücher Übersicht</title>
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
    </table>
    
<?php
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
];

$pdo = new PDO('mysql:host=localhost;dbname=PiLibrary', 'php', 'passwort', $options);

$stmt = $pdo->query("SELECT * FROM Buecher");
$name =$stmt->fetch();
echo "test";
echo $name;
?>


    </body>
</html>