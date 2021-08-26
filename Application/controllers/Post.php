<?php

use Application\core\Controller;

class Post extends Controller
{
  /**
  * chama a view index.php da seguinte forma /post/index   ou somente   /post
  * e retorna para a view todos os usuários no banco de dados.
  */
  public function index()
  {
    $Posts = $this->model('Posts'); // é retornado o model Posts()
    $data = $Posts::findAll();
    $this->view('post/index', ['posts' => $data]);
  }

  /**
  * chama a view show.php da seguinte forma /post/show passando um parâmetro 
  * via URL /post/show/id e é retornado um array contendo (ou não) um determinado
  * usuário. Além disso é verificado se foi passado ou não um id pela url, caso
  * não seja informado, é chamado a view de página não encontrada.
  * @param  int   $id   Identificado do usuário.
  */
  public function show($id = null)
  {
    if (is_numeric($id)) {
      $Posts = $this->model('Posts');
      $data = $Posts::findById($id);
      $this->view('post/show', ['post' => $data]);
    } else {
      $this->pageNotFound();
    }
  }

  public function create()
  {
    $this->view('post/create');
  }

  public function insert()
  {
    $Posts = $this->model('Posts');
    $Posts::insertPost($_POST);
    $this->view('post/insert');
  }

  public function delete($id = null)
  {
    if (is_numeric($id)) {
      $Posts = $this->model('Posts');
      $data = $Posts::deleteById($id);
      $this->view('post/delete');
    } else {
      $this->pageNotFound();
    }
  }

  public function edit($id = null)
  {
    if (is_numeric($id)) {
      $Posts = $this->model('Posts');
      $data = $Posts::findById($id);
      $this->view('post/edit', ['post' => $data]);
    } else {
      $this->pageNotFound();
    }
  }

  public function update()
  {
    $Posts = $this->model('Posts');
    $Posts::updatePost($_POST);
    $this->view('post/update');
  }


}