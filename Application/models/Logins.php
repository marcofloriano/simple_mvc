<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Logins
{
  /** Poderiamos ter atributos aqui */

  /**
  * Este método autentica o usuário informado na tela de login, comparando os dados informados com os armazenados na base de dados
  * @param    array     $user   Usuário e senha informados (POST)
  * 
  * @return   array
  */
  public static function authenticateUser($user)
  {
    $username = $user['username'];
    $password = $user['password'];

    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM usuarios WHERE usuario = :USERNAME LIMIT 1', array(
      ':USERNAME' => $username
    ));
    $usuario = $result->fetchAll(PDO::FETCH_ASSOC);

    if($usuario['0']['usuario'] == $username && $usuario['0']['senha'] == $password) {
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $usuario['0']['nome'];
      $_SESSION['id'] = $usuario['0']['id'];
      return $usuario;
    }
  }

}