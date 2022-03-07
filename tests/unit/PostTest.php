<?php

class PostTest extends \PHPUnit\Framework\TestCase
{
	protected $post;

	public function setUp() :void
	{
		$this->post = new \Application\models\Posts;
	}

	public function testFindAllPosts()
	{	
		//inserir post no banco de dados
		$post = array();
		$post['titulo'] = "Perpétua e Felicidade";
		$post['texto'] = "Perpétua, mulher patrícia de cerca de vinte e dois anos de idade, era mãe de uma criança de peito; Felicidade, sua escrava, estando grávida, segundo as leis devia ser conservada até dar à luz; mas, apesar das dores de parto, mostrava-se serena diante das feras. Passaram ambas do cárcere para o anfiteatro, de rosto alegre, seguras de que iam para o Céu.";
		$this->post->insertPost($post);

		//realizar teste
		$this->assertGreaterThan(1, count($this->post->findAll()));

		//remover post    	
		$posts = $this->post->findAll();
		$postTeste = end($posts);
    	$this->post->deleteById($postTeste['id']); 
	}

	public function testFindPostById()
	{
		//inserir post no banco de dados
		$post = array();
		$post['titulo'] = "Perpétua e Felicidade";
		$post['texto'] = "Perpétua, mulher patrícia de cerca de vinte e dois anos de idade, era mãe de uma criança de peito; Felicidade, sua escrava, estando grávida, segundo as leis devia ser conservada até dar à luz; mas, apesar das dores de parto, mostrava-se serena diante das feras. Passaram ambas do cárcere para o anfiteatro, de rosto alegre, seguras de que iam para o Céu.";
		$this->post->insertPost($post);

		//realizar teste
		$posts = $this->post->findAll();
		$teste[0] = $postTeste = end($posts);
		$this->assertEquals($teste, $this->post->findById($postTeste['id']));

		//remover post		
    	$this->post->deleteById($postTeste['id']);
	}

	public function testInsertPost()
	{
		$post = array();
		$post['titulo'] = "Perpétua e Felicidade";
		$post['texto'] = "Perpétua, mulher patrícia de cerca de vinte e dois anos de idade, era mãe de uma criança de peito; Felicidade, sua escrava, estando grávida, segundo as leis devia ser conservada até dar à luz; mas, apesar das dores de parto, mostrava-se serena diante das feras. Passaram ambas do cárcere para o anfiteatro, de rosto alegre, seguras de que iam para o Céu.";

		//realizar teste
    	$this->assertTrue($this->post->insertPost($post));

    	//remover usuario    	
    	$posts = $this->post->findAll();
		$postTeste = end($posts);
    	$this->post->deleteById($postTeste['id']);
	}

	public function testUpdatePost()
	{
		//inserir post no banco de dados
		$post = array();
		$post['titulo'] = "Perpétua e Felicidade";
		$post['texto'] = "Perpétua, mulher patrícia de cerca de vinte e dois anos de idade, era mãe de uma criança de peito; Felicidade, sua escrava, estando grávida, segundo as leis devia ser conservada até dar à luz; mas, apesar das dores de parto, mostrava-se serena diante das feras. Passaram ambas do cárcere para o anfiteatro, de rosto alegre, seguras de que iam para o Céu.";
		$this->post->insertPost($post);

		//realizar teste
		$posts = $this->post->findAll();
		$postTeste = end($posts);
		$postTeste['titulo'] = 'Sátiro, Saturnino, Revocato e Secundino';
		$postTeste['texto'] = 'Também em Cartago, a paixão dos santos Sátiro, Saturnino, Revocato e Secundino, que morreram na mesma perseguição. O último morreu no cárcere; os outros, depois de sofrerem as investidas de várias feras, deram mutuamente o ósculo santo e sucumbiram degolados ao golpe da espada.';
		$this->assertTrue($this->post->updatePost($postTeste));

		//remover post
		$this->post->deleteById($postTeste['id']);
	}

	public function testDeletePost()
	{
		//inserir post no banco de dados
		$post = array();
		$post['titulo'] = "Perpétua e Felicidade";
		$post['texto'] = "Perpétua, mulher patrícia de cerca de vinte e dois anos de idade, era mãe de uma criança de peito; Felicidade, sua escrava, estando grávida, segundo as leis devia ser conservada até dar à luz; mas, apesar das dores de parto, mostrava-se serena diante das feras. Passaram ambas do cárcere para o anfiteatro, de rosto alegre, seguras de que iam para o Céu.";
		$this->post->insertPost($post);

		//realizar teste
		$posts = $this->post->findAll();
		$postTeste = end($posts);
    	$this->assertTrue($this->post->deleteById($postTeste['id']));
	}
}
