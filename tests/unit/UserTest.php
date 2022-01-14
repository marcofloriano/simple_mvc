<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
	public function testThatWeCanFindAllUsers()
	{
		$user = new \Application\models\Users;
		$this->assertNotEmpty($user->findAll());
	}

	public function testThatWeCanFindUserById()
	{
		$user = new \Application\models\Users;
		$users = $user->findAll();
		$id = $users[0]['id'];
		$this->assertNotEmpty($user->findById($id));
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
}