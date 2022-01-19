<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Posts
{
  /** Poderiamos ter atributos aqui */

  /**
  * Este método busca todos os posts armazenados na base de dados
  *
  * @return   array
  */
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM posts');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um post armazenados na base de dados com um
  * determinado ID
  * @param    int     $id   Identificador único do post
  *
  * @return   array
  */
  public static function findById(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM posts WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function insertPost($post)
  {
    $postTitulo = $post['titulo'];
    $postTexto = $post['texto'];
    $conn = new Database();
    if( $result = $conn->executeQuery("INSERT INTO posts (titulo, texto)
VALUES ('$postTitulo', '$postTexto')") ) {
      return true;
    }    
  }

  public static function deleteById(int $id)
  {
    $conn = new Database();
    if($result = $conn->executeQuery('DELETE FROM `posts` WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    )) ) {
      return true;
    }
  }

  public static function updatePost($post)
  {
    $postId = $post['id'];
    $postTitulo = $post['titulo'];
    $postTexto = $post['texto'];

    $conn = new Database();
    if($result = $conn->executeQuery("UPDATE posts SET titulo='$postTitulo', texto='$postTexto' WHERE id = $postId")) {
      return true;
    }
  }

}