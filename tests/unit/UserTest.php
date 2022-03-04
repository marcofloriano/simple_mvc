<?php
session_start();

class UserTest extends \PHPUnit\Framework\TestCase
{
	protected $user;

	public function setUp() :void 
	{
		$this->user = new \Application\models\Users;
	}

	public function testFindUserById()
	{
		//inserir usuario no banco de dados
		$usuario = array();
		$usuario['nome'] = 'Marco Teste';
    	$usuario['usuario'] = 'marcoteste';
    	$usuario['senha'] = 'teste';
    	$usuario['email'] = 'marcoteste@gmail.com';
    	$this->user->insertUser($usuario);

    	//realizar teste
    	$usuarios = $this->user->findAll();
    	$usuarioTeste = end($usuarios);
    	var_dump($this->user->findById($usuarioTeste['id']));
    	var_dump($usuarioTeste);
    	//$this->assertEquals($usuarioTeste, $this->user->findById($usuarioTeste['id']));

    	//remover usuario
    	$this->user->deleteById($usuarioTeste['id']);
	}

	/*

	public function testFindAllUsers()
	{
		//inserir usuario no banco de dados
		$usuario = array();
		$usuario['nome'] = 'Marco Teste';
    	$usuario['usuario'] = 'marcoteste';
    	$usuario['senha'] = 'teste';
    	$usuario['email'] = 'marcoteste@gmail.com';
    	$this->user->insertUser($usuario);
		
		//realizar teste
		$this->assertGreaterThan(1, count($this->user->findAll()));

		//remover usuario    	
    	$usuarios = $this->user->findAll();
		$usuarioTeste = end($usuarios);
    	$this->user->deleteById($usuarioTeste['id']);
	}

	public function testInsertUser()
	{
		//inserir usuario no banco de dados
		$usuario = array();
		$usuario['nome'] = 'Marco Teste';
    	$usuario['usuario'] = 'marcoteste';
    	$usuario['senha'] = 'teste';
    	$usuario['email'] = 'marcoteste@gmail.com';

    	//realizar teste
    	$this->assertTrue($this->user->insertUser($usuario));

    	//remover usuario    	
    	$usuarios = $this->user->findAll();
		$usuarioTeste = end($usuarios);
    	$this->user->deleteById($usuarioTeste['id']);    	    	
	}

	public function testUpdateUser()
	{
		//inserir usuario no banco de dados
		$usuario = array();
		$usuario['nome'] = 'Marco Teste';
    	$usuario['usuario'] = 'marcoteste';
    	$usuario['senha'] = 'teste';
    	$usuario['email'] = 'marcoteste@gmail.com';
    	$this->user->insertUser($usuario);

    	//realizar teste
		$usuarios = $this->user->findAll();
		$usuarioTeste = end($usuarios);
		$usuarioTeste['nome'] = 'Marco Teste 2';
		$usuarioTeste['usuario'] = 'marcoteste2';
		$usuarioTeste['senha'] = 'teste';
		$usuarioTeste['email'] = 'marcoteste2@gmail.com';
		$this->assertTrue($this->user->updateUser($usuarioTeste));

		//remover usuario
    	$this->user->deleteById($usuarioTeste['id']);  
	}

	public function testResetPassword()
	{	
		//inserir usuario no banco de dados
		$usuario = array();
		$usuario['nome'] = 'Marco Teste';
    	$usuario['usuario'] = 'marcoteste';
    	$usuario['senha'] = 'teste';
    	$usuario['email'] = 'marcoteste@gmail.com';
    	$this->user->insertUser($usuario);	

		//realizar teste
		$usuarios = $this->user->findAll();
		$usuarioTeste = end($usuarios);
		$this->assertTrue($this->user->resetPassword($usuarioTeste['id'], 'floriano.123'));

		//remover usuario
    	$this->user->deleteById($usuarioTeste['id']); 
	}

	public function testAuthenticateUser()
	{
		//inserir usuario no banco de dados
		$usuario = array();
		$usuario['nome'] = 'Marco Teste';
    	$usuario['usuario'] = 'marcoteste';
    	$usuario['senha'] = 'teste';
    	$usuario['email'] = 'marcoteste@gmail.com';
    	$this->user->insertUser($usuario);	

		//realizar teste
		$usuarios = $this->user->findAll();
		$usuarioTeste = end($usuarios);
		$usuarioTeste['username'] = 'marcoteste';
		$usuarioTeste['password'] = 'teste';
		$autenticar = $this->user->authenticateUser($usuarioTeste);
		$this->assertEquals($autenticar[0]['id'], $usuarioTeste['id']);

		//remover usuario
    	$this->user->deleteById($usuarioTeste['id']); 
	}

	/*

	public function testThatWeCanDeleteUser()
	{
		$usuarios = $this->user->findAll();
		$lastUser = end($usuarios);
		$id = $lastUser['id'];
		$this->assertTrue($this->user->deleteById($id));
	}

	*/

}
