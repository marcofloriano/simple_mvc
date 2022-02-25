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

  public static function insertUser($usuario)
  {
    $usuarioNome = $usuario['nome'];
    $usuarioUsuario = $usuario['usuario'];
    $usuarioSenha = password_hash($usuario['senha'], PASSWORD_DEFAULT);
    $usuarioEmail = $usuario['email'];
    
    $conn = new Database();
    $result = $conn->executeQuery("INSERT INTO usuarios (nome, usuario, senha, email)
VALUES ('$usuarioNome', '$usuarioUsuario', '$usuarioSenha', '$usuarioEmail')");
    return $conn->response;    
  }

  public static function deleteById(int $id)
  {
    $conn = new Database();
    if($result = $conn->executeQuery('DELETE FROM `usuarios` WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ))) {
      return true;
    }
  }

  public static function updateUser($usuario)
  {
    $usuarioId = $usuario['id'];
    $usuarioNome = $usuario['nome'];
    $usuarioUsuario = $usuario['usuario'];    
    $usuarioEmail = $usuario['email'];
    $usuarioSenha = $usuario['senha'];
    if($usuarioSenha != '') {
      self::resetPassword($usuarioId, $usuarioSenha);
    }    

    $conn = new Database();
    $result = $conn->executeQuery("UPDATE usuarios SET nome='$usuarioNome', usuario='$usuarioUsuario', email='$usuarioEmail' WHERE id = $usuarioId");
    return $conn->response;
  }

  public static function resetPassword($usuarioId, $usuarioSenha) 
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM usuarios WHERE id = :ID LIMIT 1', array(
      ':ID' => $usuarioId
    ));
    $usuario = $result->fetchAll(PDO::FETCH_ASSOC);
    
    $usuarioSenha = password_hash($usuarioSenha, PASSWORD_DEFAULT);
    if($conn->executeQuery("UPDATE usuarios SET senha='$usuarioSenha' WHERE id = $usuarioId")) {
      return true;
    }
  }

  public static function authenticateUser($user)
  {
    $username = $user['username'];
    $password = $user['password'];

    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM usuarios WHERE usuario = :USERNAME LIMIT 1', array(
      ':USERNAME' => $username
    ));
    $usuario = $result->fetchAll(PDO::FETCH_ASSOC);

    if($usuario['0']['usuario'] == $username) {
      if( password_verify( $password,$usuario['0']['senha'] ) ) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $usuario['0']['nome'];
        $_SESSION['id'] = $usuario['0']['id'];
        return $usuario;
      }
    }
  }

}