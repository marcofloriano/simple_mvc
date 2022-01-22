<?php

class PostTest extends \PHPUnit\Framework\TestCase
{
	protected $post;

	public function setUp() :void
	{
		$this->post = new \Application\models\Posts;
	}

	public function testThatWeCanFindAllPosts()
	{		
		$posts = $this->post->findAll();
		foreach ($posts as $post) {
			$this->assertArrayHasKey( 'id' ,$post);
		}
	}

	public function testThatWeCanFindPostById()
	{
		$posts = $this->post->findAll();
		$id = $posts[0]['id'];
		$newPost = $this->post->findById($id);
		$this->assertArrayHasKey( 'id' , $newPost[0]);
	}

	public function testThatWeCanInsertPost()
	{
		$newPost = array();
		$newPost['titulo'] = 'Santo do Dia 19 de Janeiro';
    	$newPost['texto'] = 'Em Esmirna, hoje Izmir, na Turquia, a paixão de São Germânico, mártir de Filadélfia, que, no tempo dos imperadores Marco Antonino e Lúcio Aurélio, foi discípulo de São Policarpo, a quem precedeu no martírio: condenado pelo juiz ainda na flor da idade juvenil, superou pela graça de Deus o medo da sua fragilidade corporal e provocou espontaneamente a fera para ele preparada.';
    	$this->assertTrue($this->post->insertPost($newPost));
	}

	public function testThatWeCanUpdatePost()
	{
		$posts = $this->post->findAll();
		$lastPost = end($posts);
		$lastPost['titulo'] = 'Santo do Dia 19 de Janeiro (2)';
		$lastPost['texto'] = 'Em Spoleto, na Úmbria, região da Itália, São Ponciano, mártir, que, no tempo do imperador Antonino, crudelissimamente flagelado por amor de Cristo, foi finalmente morto ao fio da espada.';
		$this->assertTrue($this->post->updatePost($lastPost));
	}

	public function testThatWeCanDeletePost()
	{
		$posts = $this->post->findAll();
		$lastPost = end($posts);
		$id = $lastPost['id'];
		$this->assertTrue($this->post->deleteById($id));
	}
}
