<?php
session_start();

class UserTest extends \PHPUnit\Framework\TestCase
{
	public function testThatWeCanFindAllUsers()
	{
		$user = new \Application\models\Users;
		$users = $user->findAll();
		foreach( $users as $user ) {
			$this->assertArrayHasKey( 'id' ,$user);
		}

	}

	public function testThatWeCanFindUserById()
	{
		$user = new \Application\models\Users;
		$users = $user->findAll();
		$id = $users[0]['id'];
		$newUser = $user->findById($id);
		$this->assertArrayHasKey( 'id' , $newUser[0]);
	}

	public function testThatWeCanInsertUser()
	{
		$user = new \Application\models\Users;
		$usuario = array();
		$usuario['nome'] = 'Marco Floriano Teste';
    	$usuario['usuario'] = 'marcofloriano_teste';
    	$usuario['senha'] = 'teste.123';
    	$usuario['email'] = 'marcofloriano@gmail.com';

    	$this->assertTrue($user->insertUser($usuario));
	}

	public function testThatWeCanUpdateUser()
	{
		$user = new \Application\models\Users;
		$users = $user->findAll();
		$lastUser = end($users);
		$lastUser['nome'] = 'M F Teste';
		$lastUser['usuario'] = 'mfteste';
		$lastUser['email'] = 'mfteste@setor9.com.br';
		$lastUser['senha'] = 'mfteste.123@#';

		$this->assertTrue($user->updateUser($lastUser));
	}

	public function testThatWeCanResetUserPassword()
	{
		$user = new \Application\models\Users;
		$users = $user->findAll();
		$lastUser = end($users);

		$this->assertTrue($user->resetPassword($lastUser['id'], 'floriano.123'));
	}

	public function testThatWeCanAuthenticateUser()
	{
		$user = new \Application\models\Users;
		$users = $user->findAll();
		$lastUser = end($users);
		$lastUser['username'] = $lastUser['usuario'];
		$lastUser['password'] = 'floriano.123';

		$checkUser = $user->authenticateUser($lastUser);

		$this->assertEquals($checkUser[0]['id'], $lastUser['id']);
	}

	public function testThatWeCanDeleteUser()
	{
		$user = new \Application\models\Users;
		$users = $user->findAll();
		$lastUser = end($users);
		$id = $lastUser['id'];

		$this->assertTrue($user->deleteById($id));
	}
}