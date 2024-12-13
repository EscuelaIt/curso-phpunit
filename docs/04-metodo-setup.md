# Método setUp()

El método setUp() se ejecuta automáticamente **antes de que cada método de prueba sea procesado**. Esto asegura que cada prueba comience con un estado inicial consistente.

A partir de PHPUnit 8, debe tener la firma:

```php
protected function setUp(): void
```

- Mantén el código de setUp ligero y enfocado únicamente en lo necesario para las pruebas.
- No abuses de setUp para inicializar configuraciones complejas que no todas las pruebas necesitan, ya que puede ralentizar el proceso de prueba.
- Si tienes muchas pruebas con configuraciones similares pero no idénticas, usa métodos tuyos propios para compartir la lógica común.

## Método tearDown()

Por el lado contrario tearDown() permite realizar acciones cada vez que un caso de prueba finaliza.

```php
protected function tearDown(): void
```

