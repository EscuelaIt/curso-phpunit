# createStub

Permite crear un doble que devuelve valores determinados.

```php
$paymentService = $this->createStub(PaymentService::class);
```

Definimos los valores que necesitamos que retornen los métodos de esta manera:

```php
$paymentService->method('processPayment')->willReturn(true);
```