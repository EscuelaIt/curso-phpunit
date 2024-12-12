# Expectations

Al hacer dobles tenemos varios tipos. Hemos visto que createMock() es capaz de crear un dummy, que no hace nada en particular. Pero a veces necesitamos probar que el cierto doble ha sido invocado y los argumentos que se han enviado. Eso convierte un simple dummy en un mock, dentro de la terminología de testing.

En PHPUnit el método createMock() se usa tanto para crear dummys como para crear mocks. Solo cambia el hecho de realizar "expectations".

```php
$notificationService
  ->expects($this->once())
  ->method('sendEmail')
  ->with(
    $this->equalTo('x@example.com'), 
    $this->equalTo('Se acaba de completar el pago de un pedido')
  );
```