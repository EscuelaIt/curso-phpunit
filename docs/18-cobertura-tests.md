# Cobertura de tests

Indica qué porcentaje del código fuente es ejecutado durante la ejecución de los tests. (Qué partes del código están probadas por casos de prueba).

## Requisitos

Necesitamos Xdebug o PCOV para poder calcular la cobertura

```bash
php --version
```

Si tienes Xdebug debe aparecer de una manera similar a esta:

```
PHP 8.2.26 (cli) (built: Dec  3 2024 03:56:02) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.2.26, Copyright (c) Zend Technologies
    with Xdebug v3.4.0, Copyright (c) 2002-2024, by Derick Rethans
```


## Instalar Xdebug

<https://xdebug.org/docs/install>

```bash
sudo pecl install xdebug
```

Habilitar la extensión en `php.ini`:
     
```ini
zend_extension="/usr/lib/php/xxxx/xdebug.so"
```

> Comando que indica ubicación del php.ini de PHP CLI: `php --ini`

Descarga la DLL desde [https://xdebug.org/download](https://xdebug.org/download) y configúrala en `php.ini`:

```ini
zend_extension="C:\php\ext\php_xdebug.dll"
```

## Configurar Xdebug para la cobertura

xdebug.ini

```ini
zend_extension=xdebug.so
xdebug.mode=coverage
xdebug.start_with_request=yes
```

## Comando para mosrtar la cobertura

```bash
phpunit tests --coverage-text --coverage-filter=src --colors
```

## Configuración de PHPUnit para Cobertura

Archivo `phpunit.xml` en la raíz del proyecto.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/11.5/phpunit.xsd" bootstrap="vendor/autoload.php">
  <source>
    <include>
      <directory suffix=".php">src</directory>
    </include>
  </source>
  <coverage pathCoverage="false" ignoreDeprecatedCodeUnits="true" disableCodeCoverageIgnore="true">
    <report>
      <html outputFile="coverage.html" outputDirectory="html-coverage"/>
  </report>
  </coverage>
</phpunit>
```

## Nota Docker

En mi caso no he conseguido configurar Xdebug en mi ordenador en local a la primera, así que he usado Docker. Dejo aquí los pasos por si alguien lo necesita.

### Dockerfile

Tener Docker instalado. Docker Desktop.

Crear archivo Dockerfile en la raíz del proyecto:

```
FROM php:8.2-cli

RUN pecl install xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /app
```

Hacer el build de los contenedores.

```bash
docker build -t mi-php-xdebug .
```

Abrir una sesión bash en el contenedor.

```bash
docker run --rm -it -v $(pwd):/app mi-php-xdebug bash
```