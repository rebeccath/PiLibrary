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
    
<?php
$pdo = new PDO('mysql:host=localhost;dbname=PiLibrary', 'php', 'passwort');
 
$sql = "SELECT * FROM Buecher";

/*Hier in Tabelle überfphren */

?>

    </table>
    </body>
</html>