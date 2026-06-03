<!DOCTYPE html>
<html>
    <head>
        <title>Dokumentation</title>
    </head>
    <body>
        <?php include "menu.html" ?>
    <h1>Automatisiertes Bibliothekssystem auf Raspberry Pi Basis</h1>

    <h2>1. Projektvorstellung</h2>
    <ul>
        <li><strong>Projektziel:</strong> Aufbau eines automatisierten Bibliothekssystems auf Raspberry Pi Basis</li>
        <li>
            <strong>Hauptkomponenten:</strong>
            <ul>
                <li>Raspberry Pi</li>
                <li>Webserver + PHP</li>
                <li>MariaDB Datenbank</li>
                <li>Python Backend</li>
                <li>RFID Reader (PN532)</li>
            </ul>
        </li>
        <li><strong>Motivation:</strong> Warum dieses Projekt? Nutzen? Lernziele?</li>
    </ul>

    <h2>2. Systemaufbau &amp; Infrastruktur</h2>

    <h3>2.1 Raspberry Pi Grundeinrichtung</h3>
    <ul>
        <li>Raspberry Pi OS Lite Installation</li>
        <li>SSH Konfiguration (Key Login, Passwortlogin deaktiviert)</li>
        <li>Benutzer- und Rechteverwaltung</li>
    </ul>

    <h3>2.2 Webserver</h3>
    <ul>
        <li>Apache2 Installation</li>
        <li>DocumentRoot → /var/www/html/PiLibrary</li>
        <li>Git Versionierung für Webinhalte</li>
    </ul>

    <h3>2.3 PHP Umgebung</h3>
    <ul>
        <li>PHP + Module (libapache2-mod-php, php-mysql)</li>
        <li>Anpassung der Apache Config (DirectoryIndex)</li>
        <li>Lokale Entwicklungsumgebung unter Windows</li>
    </ul>

    <h2>3. Datenbankdesign</h2>

    <h3>3.1 Tabellenstruktur</h3>
    <ul>
        <li>Bücher</li>
        <li>Kunden</li>
        <li>Ausleihen</li>
    </ul>

    <h3>3.2 Beispiel SQL</h3>
    <ul>
        <li>Anlegen der Datenbank</li>
        <li>Einfügen von Testdaten</li>
        <li>Nutzer- und Rechteverwaltung</li>
    </ul>

    <h3>3.3 ER-Modell / Struktogramm</h3>
    <ul>
        <li>
            Beziehungen:
            <ul>
                <li>1 Kunde ↔ viele Ausleihen</li>
                <li>1 Buch ↔ viele Ausleihen</li>
            </ul>
        </li>
    </ul>

    <h2>4. Python Backend</h2>

    <h3>4.1 Aufgaben des Python Programms</h3>
    <ul>
        <li>RFID UID auslesen</li>
        <li>Datenbankzugriffe (INSERT, SELECT)</li>
        <li>Logik für Ausleihe/Rückgabe</li>
    </ul>

    <h3>4.2 MySQL Connector</h3>
    <ul>
        <li>Wrapper Klasse SimpleMySQL</li>
        <li>Beispiel: Datensatz einfügen &amp; auslesen</li>
    </ul>

    <h3>4.3 Autostart</h3>
    <ul>
        <li>systemd Service</li>
        <li>Starten im venv</li>
        <li>Überwachung via systemctl status</li>
    </ul>

    <h2>5. RFID System</h2>

    <h3>5.1 Hardware</h3>
    <ul>
        <li>PN532 per I²C</li>
        <li>Verkabelung (5V, GND, SDA, SCL)</li>
    </ul>

    <h3>5.2 Software</h3>
    <ul>
        <li>Alte Bibliothek (mfrc522) → deprecated</li>
        <li>Neue Lösung: Adafruit PN532 Library</li>
        <li>Beispiel Output (UID als Hex &amp; Bytearray)</li>
    </ul>

    <h3>5.3 Besonderheit: libgpiod</h3>
    <ul>
        <li>Debian 13 nutzt libgpiod 2.x</li>
        <li>Alte Bibliotheken benötigen 1.x</li>
        <li>Lösung: Parallelinstallation von libgpiod 1.6.4</li>
        <li>Python Bindings manuell installiert</li>
    </ul>

    <h2>6. Weboberfläche</h2>
    <ul>
        <li>HTML/PHP Frontend</li>
        <li>Anzeige von Büchern</li>
        <li>Ausleihstatus</li>
        <li>Verbindung zur Datenbank</li>
    </ul>

    <h2>7. Herausforderungen &amp; Lösungen</h2>

    <h3>7.1 SSH &amp; Rechte</h3>
    <ul>
        <li>Key Login funktionierte nicht sofort</li>
        <li>Lösung: authorized_keys korrekt setzen</li>
    </ul>

    <h3>7.2 Apache Rechte</h3>
    <ul>
        <li>Webentwickler Gruppe benötigt eingeschränkte sudo Rechte</li>
        <li>Lösung: gezielte systemctl Freigaben</li>
    </ul>

    <h3>7.3 PHP Versionen</h3>
    <ul>
        <li>Unterschiedliche Versionen auf Pi vs. Windows</li>
        <li>Lösung: PATH Variable &amp; VC Redistributables</li>
    </ul>

    <h3>7.4 RFID Reader</h3>
    <ul>
        <li>Alte Bibliothek nicht kompatibel</li>
        <li>Lösung: Umstieg auf Adafruit PN532</li>
        <li>Problem: libgpiod 2.x inkompatibel</li>
        <li>Lösung: libgpiod 1.x parallel installieren</li>
    </ul>

    <h3>7.5 Python Autostart</h3>
    <ul>
        <li>venv wurde nicht geladen</li>
        <li>Lösung: systemd Service mit absolutem Pfad</li>
    </ul>

    <h2>8. Ergebnis</h2>
    <ul>
        <li>
            Voll funktionsfähiges System:
            <ul>
                <li>RFID Erkennung</li>
                <li>Datenbankverwaltung</li>
                <li>Weboberfläche</li>
                <li>Automatischer Python Dienst</li>
            </ul>
        </li>
        <li>Modular aufgebaut</li>
        <li>Erweiterbar (z. B. E-Mail Benachrichtigungen, Statistiken)</li>
    </ul>

    <h2>9. Ausblick</h2>
    <ul>
        <li>Login-Bereich</li>
        <li>UI für Eingabe von neuen Büchern und Kunden</li>
        <li>Suchfunktion / Sortieren</li>
        <li>Automatische Rückgabeerinnerungen (E-Mail)</li>
        <li>Logging &amp; Monitoring</li>
        <li>Backup</li>
    </ul>

    <h2>10. Demo / Live Vorführung</h2>
    <ul>
        <li>RFID Scan</li>
        <li>Buch wird in DB eingetragen</li>
        <li>Weboberfläche zeigt Status</li>
        <li>Rückgabe simulieren</li>
    </ul>
    </body>
</html>