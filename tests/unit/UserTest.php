<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
	public function testFindAllUsers()
	{
		$user = new \Application\models\Users;
		$this->assertIsArray($user->findAll());
	}
}