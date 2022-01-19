<?php

class PostTest extends \PHPUnit\Framework\TestCase
{
	public function testThatWeCanFindAllPosts()
	{
		$post = new \Application\models\Posts;
		$this->assertNotEmpty($post->findAll());
	}

	public function testThatWeCanFindPostById()
	{
		$post = new \Application\models\Posts;
		$posts = $post->findAll();
		$id = $posts[0]['id'];
		$this->assertNotEmpty($post->findById($id));
	}

	public function testThatWeCanInsertPost()
	{
		$post = new \Application\models\Posts;
		$newPost = array();
		$newPost['titulo'] = 'Santo do Dia 19 de Janeiro';
    	$newPost['texto'] = 'Em Esmirna, hoje Izmir, na Turquia, a paixão de São Germânico, mártir de Filadélfia, que, no tempo dos imperadores Marco Antonino e Lúcio Aurélio, foi discípulo de São Policarpo, a quem precedeu no martírio: condenado pelo juiz ainda na flor da idade juvenil, superou pela graça de Deus o medo da sua fragilidade corporal e provocou espontaneamente a fera para ele preparada.';

    	$this->assertTrue($post->insertPost($newPost));
	}

	public function testThatWeCanUpdatePost()
	{
		$post = new \Application\models\Posts;
		$posts = $post->findAll();
		$lastPost = end($posts);
		$lastPost['titulo'] = 'Santo do Dia 19 de Janeiro (2)';
		$lastPost['texto'] = 'Em Spoleto, na Úmbria, região da Itália, São Ponciano, mártir, que, no tempo do imperador Antonino, crudelissimamente flagelado por amor de Cristo, foi finalmente morto ao fio da espada.';

		$this->assertTrue($post->updatePost($lastPost));
	}

	public function testThatWeCanDeletePost()
	{
		$post = new \Application\models\Posts;
		$posts = $post->findAll();
		$lastPost = end($posts);
		$id = $lastPost['id'];

		$this->assertTrue($post->deleteById($id));
	}
}
