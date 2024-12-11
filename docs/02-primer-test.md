
# Primer test unitario

Recordar que es un curso práctico de PHPUnit.

Recomendado tener el conocimiento de testing, ver el [Curso de Pruebas del Software](https://escuela.it/cursos/pruebas-software) 

## Patrón básico de pruebas

- Given // When // Then
- Arrange // Act // Assert

Es la manera normal de estructurar los test:

- **Given (dado) / Arrange (preparar)**: Configurar el estado inicial y los datos necesarios para ejecutar el test.
- **When (cuando) / Act (actuar)**: Ejecutar el comportamiento que se desea probar.
- **Then (entonces) / Assert (Verificar): Validar que los resultados obtenidos sean los esperados.

Nuestro ejemplo:

```php
public function testFactorialOne() {
  $factorial = new Factorial();
  $this->assertEquals(1, $factorial->calculate(1));
}
```

Estructurado para ver las etapas:

```php
public function testFactorialOne() {
  // Arrange
  $factorial = new Factorial();
  // Act
  $factorialOfOne = $factorial->calculate(1);
  // Assert
  $this->assertEquals(1, $factorialOfOne);
}
```



