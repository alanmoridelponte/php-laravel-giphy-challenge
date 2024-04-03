# Challenge PHP PREX

## Tecnologías

- PHP v8.2.
- Laravel v10.
- MySQL.
- Docker

## Requisitos Previos

- Docker: como mínimo hay que tenerlo instalado
- Api Key Giphy: Es necesario hacerte una cuenta en GIPHY Developers

## Levantar API

1. Clonar repositorio

```bash
git clone https://github.com/alanmoridelponte/php-laravel-giphy-challenge.git
```

2. Generar archivo .env

```bash
cp .env.example .env
```

3. Agregar el api key de Giphy developer en el `.env`

```env
GIPHY_API_KEY=api-key
```

4. Instalar librerías Composer, necesario para levantar ambiente con Laravel Sail

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
Este contenedor utilizara PHP 8.2 y Composer para instalar la librerías

5. Levantar ambiente con Laravel Sail

```bash
./vendor/bin/sail up -d
```

6. Ejecutar las migraciones

```bash
./vendor/bin/sail artisan migrate
```

7. Configuración de passport (seleccionar los valores por defecto)

```bash
./vendor/bin/sail artisan passport:install
```
## Log de acceso a la api

En `storage/logs/api_access.log` listaremos los accesos a la api, ejemplo:
```bash
[2024-04-03 02:51:44] local.INFO: Received HTTP request {"user_id":1,"services_invoked":["App\\Services\\UserFavoriteGiphyGifService\\UserFavoriteGiphyGifService"],"request_method":"POST","request_body":{"gif_id":"cfuL5gqFDreXxkWQ4o","alias":"gatito","user_id":1},"response_http_code":200,"response_body":{"ArrayObject":[]},"timestamp":"2024-04-03 02:51:44","ip":"172.24.0.1"} 
```

## Postman

Para hacer la pruebas en Postman, existe un archivo (.json) en la carpeta `./docs/postman`. Este archivo contiene la colección, para probar los endpoints de la API.

## Test

Para probar los feature test ejecutar el siguiente comando

```bash
./vendor/bin/sail artisan test
```

## Diagramas

Los diagramas de Casos de Uso, Secuencia, y DER, se encuentran en `docs/diagrams/diagramas.docx`

## Datos para conectarse a la DB desde un gestor de DBs

```bash
host: localhost
user: sail
password: password
database: challenge_php
port: 3306
```
