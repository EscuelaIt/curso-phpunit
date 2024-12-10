# Data providers

Son juegos de datos que podemos usar en métodos de test, de modo que no necesitemos duplicar un método "n" veces si lo único que cambian son los datos con los que se tienen que probar las funcionalidades.

Un juego de datos se declara como un método estático que devuelve un array.

```php
public static function additionProvider(): array {
    return [
        [0, 0, 0],
        [0, 1, 1],
        [1, 0, 1],
        [1, 1, 3],
    ];
}
```

Luego tenemos que definir un atributo para un método indicando el data provider que nos proporcionará los datos

```php
use PHPUnit\Framework\Attributes\DataProvider;

#[DataProvider('additionProvider')]
public function testAdd(int $a, int $b, int $expected): void {
    $this->assertSame($expected, $a + $b);
}
```

Podemos indicar una llave en los data providers para saber qué se está testeando

```php
public static function additionProvider(): array {
    return [
        'adding zeros'  => [0, 0, 0],
        'zero plus one' => [0, 1, 1],
        'one plus zero' => [1, 0, 1],
        'one plus one'  => [1, 1, 3],
    ];
}
```

