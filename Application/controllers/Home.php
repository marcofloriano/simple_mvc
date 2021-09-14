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

}