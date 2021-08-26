<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Users
{
  /** Poderiamos ter atributos aqui */

  /**
  * Este método busca todos os usuários armazenados na base de dados
  *
  * @return   array
  */
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM usuarios');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um usuário armazenados na base de dados com um
  * determinado ID
  * @param    int     $id   Identificador único do usuário
  *
  * @return   array
  */
  public static function findById(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM usuarios WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function insertUser($user)
  {
    $userName = $user['nome'];
    $conn = new Database();
    $result = $conn->executeQuery("INSERT INTO usuarios (nome)
VALUES ('$userName')");    
  }

  public static function deleteById(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('DELETE FROM `usuarios` WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));
  }

  public static function updateUser($user)
  {
    $userId = $user['id'];
    $userName = $user['nome'];

    $conn = new Database();
    $result = $conn->executeQuery("UPDATE usuarios SET nome='$userName' WHERE id = $userId");
  }

}