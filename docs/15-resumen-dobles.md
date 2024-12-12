# Resumen dobles

## createStub()

Crear un objeto simulado que devuelve respuestas predefinidas.

Usa cuando no te importa si esos métodos son llamados o cómo se interactúa con ellos. Te interesa el resultado, no en cómo se llama al Stub.

## createMock()

Crear un objeto simulado, pero que permite **verificar interacciones**.

Usa cuando necesitas validar que un método fue llamado, cuántas veces fue llamado, o con qué parámetros.


## Comparativa

|                     | `createStub()`                   | `createMock()`                    |
|----------------------------|-----------------------------------|-----------------------------------|
| **Propósito**               | Simular valores de retorno.      | Verificar interacciones.          |
| **Verificación de llamadas** | No disponible.                  | Sí, puedes verificar cuántas veces y cómo se llama un método. |
| **Configuración**           | Solo valores de retorno.         | Valores de retorno y expectativas sobre llamadas. |
| **Usos típicos**            | Dependencias pasivas.            | Validar interacciones activas.    |
