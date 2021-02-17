# docker_zaliczenie
<a>Zaliczenie z przedmiotu Wprowadzenie do kontenerów (Docker i Kubernetees) // CDV 2021</a>

<a>Projekt posiada dwa pliki (docker-compose.yaml, php.Dockerfile) służące do utworzenia trzech kontenerów - php-apache, mysql oraz phpMyAdmin. W projekcie znajduje się również folder /html zamontowany w kontenerze php-apache w ścieżce /var/www/html. W folderze projektowym znajduje się również skrypt redsec.sql montowany do folderu /docker-entrypoint-initdb.d w kontenerze obsługującym mysql - specyfika folderu polega na tym, że po utworzeniu kontenera uruchamia wszystkie pliki .sql znajdujące się w nim, co pozwala na zaimportowanie gotowej bazy danych.</a>

<a>Uruchomienie:</a>
<a><b>w folderze z pobranym projektem</b></a>
<a>docker-compose up -d</a>
<a>W gotowej architekturze składającej się z trzech kontenerów osadzona zostaje aplikacja (utworzona przez nas na potrzeby projektu z programowania aplikacji web na II roku).</a>
<a>Połączenie:</a>
<a>127.0.0.1:80/index.php</a>
