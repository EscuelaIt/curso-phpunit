# Bases de datos

Podemos probar modelos que almacenan datos en la base de datos. 

Para ello lo ideal es usar un motor de base de datos en memoria. Podemos recurrir a la técnica de inyección de dependencias para darle al modelo una conexión con base de datos, que puede ser real o bien en memoria.

```php
class Post {
  private PDO $db;

  public function __construct(PDO $db)
  {
      $this->db = $db;
  }

  // métodos del modelo
}
```

En pruebas podemos crear una conexión de SQLite en memoria:

```php
$this->db = new PDO('sqlite::memory:');
```

