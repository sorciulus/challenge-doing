DEV CHALLENGE
===============================

### Requisiti 

Per installare correttamente il progetto è necessario avere, sul sistema operativo di turno, composer ed una versione di php >= 5.5

### Installazione

Spostare tutto il contenuto della directory in una cartella a piaciemento

lanciare il seguente comando nella root del progetto
```
composer update
```

### Avvio progetto

portarsi sulla root del progetto e lanciare da riga di comando il seguente codice
```
php init.php 1
#oppure
php init.php 2
```

### UnitTest

E' possibile lanciare i vari test con phpunit 

Ecco un esempio, posizionarsi sulla root del progetto e lanciare il seguente comando
```
phpunit --bootstrap vendor/autoload.php tests/CurrencyTest
```