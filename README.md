# Base para hacer tests

Configuración básica para empezar a hacer una kata o aprender a hacer tests en los siguientes lenguajes:

- PHP y PHPUnit
- Javascript con Jest
- Typescript con Deno
- Java, Junit y Mockito
- Kotlin, JUnit5 y MockK

# Configuración específica por lenguaje

## PHP con PHPUnit

1. Instalar [composer](https://getcomposer.org/) `curl -sS https://getcomposer.org/installer | php`
2. `composer install` (estando en la carpeta php)
3. `./vendor/bin/phpunit`

### 📚 Documentación
- [PHPUnit](https://phpunit.readthedocs.io/)
- [Prophecy](https://github.com/phpspec/prophecy) para dobles de prueba

## Javascript con Jest

1. Instalar [Node](http://nodejs.org/)
2. `npm install` (Estando en la carpeta javascript)
3. `npm test`

### 📚 Documentación
- [Jest](https://jestjs.io)

## Typescript con Deno

1. Instalar [Deno](https://deno.land/#installation)
2. `deno test` (Estando en la carpeta typescript)

### 📚 Documentación
- [Deno](https://deno.land/manual)
- [BDD module](https://deno.land/manual/testing/behavior_driven_development)
- [Expect module](https://deno.land/x/expect)

## Java con Junit y Mockito

1. Instalar las dependencias y tests con Maven [mvn test]
2. Ejecutar los tests con el IDE

### 📚 Documentación
- [JUnit](https://github.com/junit-team/junit/wiki)
- [Mockito](http://site.mockito.org/mockito/docs/current/org/mockito/Mockito.html)

## Kotlin con JUnit5 y MockK

1. Por consola: Puedes instalar dependencias y lanzar los tests con `gradlew test`
2. Usando IDE: Simplemente abre el proyecto desde el raiz de la plantilla Kotlin

### 📚 Documentación
- [JUnit5](https://junit.org/junit5/)
- [MockK](https://mockk.io/)
