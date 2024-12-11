# Dobles

Objetos creados para sustituir dependencias reales en un test, permitiéndote controlar su comportamiento y verificar interacciones.

- Los test deben ser rápidos
- Debemos aislarnos de dependencias externas
- Entorno más controlado para los escenarios de prueba
- Evitar efectos no deseados (transacciones, emails...)
- Simplificar la configuración

## Tipos de dobles

- **Stub**: Devuelve valores predefinidos.
- **Mock**: Verifica si un método fue llamado y cómo.
- **Fake**: Simula una implementación básica.
- **Spy**: Similar a los mocks, pero almacena información sobre las interacciones.
- **Dummy**: Solo cumple con la firma, pero no se usa activamente.

## Situaciones en las que puedo necesitar un doble

- Pagos electrónicos
- Envío de notificaciones, sms, email
- Enviar ficheros a sistemas de almacenamiento remoto
- Consulta con APIs REST externas o GraphQL
- Autenticación OAuth contra Google, Facebook...
- Bases de datos
- Servicios de colas

## Ejemplo de inyección de dependencias para dobles

Tenemos una clase ShoppingCart. Esa clase debe cobrar los productos de la cesta, delegando ese trabajo a PaymentService. La implementación del PaymentService debería conversar con el banco para producir el cobro. Entonces podremos dar el shoppingCart como pagado.

En una situación normal al crearse ShoppingCart se instanciaría un PaymentService. Sin embargo, en pruebas no queremos llamar al banco directamente, por ello nos gustaría usar FakePaymentService. 

Es por eso que la implementación de un ShoppingCart no se encargará de crear el PaymentService, sino esperar que le entreguemos en el constructor el PaymentService. Puede ser el real, en la aplicación real, pero puede ser el fake en las pruebas.

![UML diagrama de clases PaymentService](./images/payment-service.png)