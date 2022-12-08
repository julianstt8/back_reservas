# BACKEND LARAVEL

# Query base de datos

Se puede realizar la migracion (php aritsan migrate) ó ejecutar el query se encuentra en la raìz del back como `dump-reservaBoletas` ó `QueryBD.txt`, MySQL.

# Clonar repositorio

git clone --branch f_julian https://github.com/julianstt8/front_reservas.git

# Versiones usadas en el proyecto

Laravel Framework 8.83.23,
Composer version 2.3.10

## Instalaciones

CMD - composer install

composer remove laravel/sanctum

## Levantar servidor

Se debe cambiar la IP `192.168.80.11` que corresponde a la mía en los environment por la IP correspondiente a su PC (abrir CMD, escribir ipconfig y te arrojara la ip de su pc).
Luego ejecutar el comando `npm start` este levantara el servidor en esta IP.

## Colocar BD archivo .env

DB_DATABASE=reservaBoletas

Solo cambiar esto, lo demás continúa igual
