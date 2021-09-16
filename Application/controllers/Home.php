<?php

use Application\core\Controller;

class Home extends Controller
{
  /*
  * chama a view index.php do  /home 
  */
  public function index()
  {
    $this->view('home/index');
  }

  public function authenticate()
  {
    $Users = $this->model('Users');
    $authenticate = $Users::authenticateUser($_POST);
    if($authenticate) {
      header('Location: /');
    } else {
      header('Location: /login.php?erro=true');
    }    
  }

  public function logout()
  {
    session_destroy();
    // Redirect to the logout page:
    header('Location: /login.php');
  }

}