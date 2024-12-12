<?php

namespace Tests;

use PDO;
use App\Post;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PostTest extends TestCase {

  protected PDO $db;
  protected Post $postModel;

  protected function setUp(): void {
    $this->db = new PDO('sqlite::memory:');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la tabla de posts
    $this->db->exec("
        CREATE TABLE posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            content TEXT NOT NULL
        )
    ");

    $this->postModel = new Post($this->db);
  }

  #[Test]
  public function createPostReturnsId() {
    $postId = $this->postModel->create('Primer Post', 'Este es el contenido de mi primer post');
    $this->assertIsInt($postId);
  }

  #[Test]
  public function createTwoPostReturnsIdsConsecutive() {
    $postId = $this->postModel->create('Primer Post', 'Este es el contenido de mi primer post');
    $postId2 = $this->postModel->create('Segundo Post', 'Este es el contenido de mi segundo post');
    $this->assertEquals($postId, $postId2 -1);
  }

  #[Test]
  public function createPostCreatesAValidPost() {
    $title = 'Primer Post';
    $content = 'Este es el contenido de mi primer post';
    $postId = $this->postModel->create($title, $content);
    
    $retrievedPost = $this->postModel->findById($postId);
    $this->assertNotNull($retrievedPost);
    $this->assertEquals($title, $retrievedPost['title']);
    $this->assertEquals($content, $retrievedPost['content']);
  }

  #[Test]
  public function unexistendPostReturnsNull() {
    $retrievedPost = $this->postModel->findById(1);
    $this->assertNull($retrievedPost);
  }
}