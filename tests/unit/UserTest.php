<?php
session_start();

class UserTest extends \PHPUnit\Framework\TestCase
{
	protected $user;

	public function setUp() :void 
	{
		$this->user = new \Application\models\Users;
	}

	public function testThatWeCanInsertUser()
	{
		$usuario = array();
		$usuario['nome'] = 'Marco Floriano Teste';
    	$usuario['usuario'] = 'marcofloriano_teste';
    	$usuario['senha'] = 'teste.123';
    	$usuario['email'] = 'marcofloriano@gmail.com';
    	$this->assertTrue($this->user->insertUser($usuario));
	}

	public function testThatWeCanUpdateUser()
	{
		$usuarios = $this->user->findAll();
		$lastUser = end($usuarios);
		$lastUser['nome'] = 'M F Teste';
		$lastUser['usuario'] = 'mfteste';
		$lastUser['email'] = 'mfteste@setor9.com.br';
		$lastUser['senha'] = 'mf123';
		$this->assertTrue($this->user->updateUser($lastUser));
	}

	public function testThatWeCanResetUserPassword()
	{
		$usuarios = $this->user->findAll();
		$lastUser = end($usuarios);
		$this->assertTrue($this->user->resetPassword($lastUser['id'], 'floriano.123'));
	}

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
		//$usuarios = $this->user->findAll();
		//foreach( $usuarios as $usuario ) {
		//	$this->assertArrayHasKey( 'id' ,$usuario);
		//}
		$this->assertTrue($this->user->findAll());
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
