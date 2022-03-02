<?php
session_start();

class UserTest extends \PHPUnit\Framework\TestCase
{
	protected $user;

	public function setUp() :void 
	{
		$this->user = new \Application\models\Users;
	}

	public function testDeleteLastUser()
	{
		//inserir usuario no banco de dados
		$usuario = array();
		$usuario['nome'] = 'Marco Teste';
    	$usuario['usuario'] = 'marcoteste';
    	$usuario['senha'] = 'teste';
    	$usuario['email'] = 'marcoteste@gmail.com';
    	$this->user->insertUser($usuario);

    	//realizar teste
		$this->assertTrue($this->user->deleteLastUser());
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
    	$this->user->deleteLastUser();
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
		$lastUser = end($usuarios);
		$lastUser['nome'] = 'Marco Teste 2';
		$lastUser['usuario'] = 'marcoteste2';
		$lastUser['senha'] = 'teste';
		$lastUser['email'] = 'marcoteste2@gmail.com';
		$this->assertTrue($this->user->updateUser($lastUser));

		//remover usuario
    	$this->user->deleteLastUser();
	}

	/*

	public function testResetUserPassword()
	{
		$usuarios = $this->user->findAll();
		$lastUser = end($usuarios);
		$this->assertTrue($this->user->resetPassword($lastUser['id'], 'floriano.123'));
	}

	/*

	public function testThatWeCanAuthenticateUser()
	{
		$usuarios = $this->user->findAll();
		$usuario = end($usuarios);
		$usuario['username'] = 'mfteste';
		$usuario['password'] = 'floriano.123';
		$checarUsuario = $this->user->authenticateUser($usuario);
		$this->assertEquals($checarUsuario[0]['id'], $usuario['id']);
	}

	

	public function testThatWeCanFindAllUsers()
	{
		
		$this->assertCount(2, $this->user->findAll());
	}

	/*

	public function testThatWeCanFindUserById()
	{
		$usuarios = $this->user->findAll();
		$id = $usuarios[0]['id'];
		$newUser = $this->user->findById($id);
		$this->assertArrayHasKey( 'id' , $newUser[0]);
	}

	public function testThatWeCanDeleteUser()
	{
		$usuarios = $this->user->findAll();
		$lastUser = end($usuarios);
		$id = $lastUser['id'];
		$this->assertTrue($this->user->deleteById($id));
	}

	*/

}
