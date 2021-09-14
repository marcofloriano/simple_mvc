<?php

use Application\core\Controller;

class Login extends Controller
{
  /*
  * chama a view index.php do  /login   ou somente   /
  */
  public function index()
  {
    $this->view('login/index');
  }

  /**
  * chama a view show.php da seguinte forma /user/show passando um parâmetro 
  * via URL /user/show/id e é retornado um array contendo (ou não) um determinado
  * usuário. Além disso é verificado se foi passado ou não um id pela url, caso
  * não seja informado, é chamado a view de página não encontrada.
  * @param  int   $id   Identificado do usuário.
  */
  public function authenticate()
  {   
    $Logins = $this->model('Logins');
    $authenticate = $Logins::authenticateUser($_POST);
    if($authenticate) {
      echo $authenticate['0']['usuario'];
    } else {
      echo "Usuário ou senha inválidos!";
    }
    
  }

}