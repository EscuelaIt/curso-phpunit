# Atributos

Antes las anotaciones de data providers se realizaban mediante comentarios:

```php
/**
  * @dataProvider provideTextAndExpectedHours
  */
public function testReadTimeInHours(string $text, int $wordsPerMinute, string $expectedHours) {
    $calculator = new ReadTimeCalculator($text, $wordsPerMinute);
    $this->assertEquals($expectedHours, $calculator->getReadTimeInHours());
}
```

Este era el único modo existente antes de PHPUnit 10 para introducir anotaciones. Estos comentarios especiales de PHP son conocidos como “DocBlocks” o “doc-comments”.

Sin embargo, PHP 8 introdujo los atributos como “una forma estructurada y sintáctica de agregar metadatos a declaraciones de clases, propiedades, funciones, métodos, parámetros y constantes. Los atributos permiten definir directivas de configuración directamente integradas con la declaración del código”.

PHPUnit buscará primero los metadatos en los atributos antes de buscar anotaciones en los comentarios. Cuando se encuentran metadatos en atributos, se ignoran los metadatos presentes en los comentarios.

Los atributos compatibles con PHPUnit están todos declarados en el espacio de nombres PHPUnit\Framework\Attributes. Están documentados en el [apéndice de Attributes](https://docs.phpunit.de/en/11.5/attributes.html).

## Atributo test

```php
#[Test]
public function ivaValues($value, $iva, $expected): void {
  $taxCalculator = new TaxesCalculator();
  $result = $taxCalculator->getIva($value, $iva);
  $this->assertEquals($result, $expected);
}
```