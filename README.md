# Schokoladen Berlin-Mitte Page
GitHub: [https://github.com/berndengels/schoki](https://github.com/berndengels/schoki)  
URL: [https://www.schokoladen-mitte.de/](https://www.schokoladen-mitte.de/)

### Installations Voraussetzungen
- Webserver (apache2, nginx)
- Mysql-Datenbank-Server (mariadb)
- composer
- npm
- git
- Mac: Homebrew, Larel Valet
- Windows: XAMPP
- php => 8.2

### Datenbank
- Mac: brew install mariadb, brew install php 
- Datenbank "schokoladen" erstellen
- als User einloggen [https://www.schokoladen-mitte.de/admin](https://www.schokoladen-mitte.de/admin)
- falls Passwort nicht bekannt, dann über [Login](https://www.schokoladen-mitte.de/login) -> "Passwort vergessen" selbiges vergeben.  
- dort die aktuelle DB herunterladen [über Media -> Download Database](https://www.schokoladen-mitte.de/admin/services/dumpdb)
- Datenbank-Datei (SQL-Dump) importieren in DB schokoladen

### Installationen
virtuellen Host für die lokale Schoki-Page erstellen 
- (Mac) am besten mit [Laravel Valet](https://laravel.com/docs/10.x/valet), setzt installiertes [Homebrew](https://brew.sh/de/) voraus.
- (Windos) [XAMPP](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe/download]

mit Terminal ins Projektverzeichnis wechseln und dort folgene Befehle ausführen
- composer install
- npm install
- npm run dev (oder npm run watch, wenn man grad an Javascript oder Sass-Dateien arbeitet)
- falls valet: valet use php@8.2, valet secure schoki (für https)
- jetzt sollte man die Seite gemäss der konfigurierten URL laden können (per valet z.B: schoki.test)

