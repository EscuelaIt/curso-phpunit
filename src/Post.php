<?php

namespace App;

use PDO;
use InvalidArgumentException;

class Post {

  private PDO $db;

  public function __construct(PDO $db)
  {
      $this->db = $db;
  }

  public function create($title, $content) {
    if (strlen($title) > 100) {
      throw new InvalidArgumentException("El título no puede exceder los 100 caracteres");
    }

    $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
    return (int)$this->db->lastInsertId();
  }

  public function findById(int $id): ?array {
      $sql = "SELECT * FROM posts WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $post = $stmt->fetch(PDO::FETCH_ASSOC);
      return $post ?: null;
  }
}