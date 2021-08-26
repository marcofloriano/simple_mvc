<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <h2>Editar Post</h2>
        <br>
        <form method="post" action="/post/update" >
          <?php foreach ($data['post'] as $post) { ?>
          <input type="hidden" id="id" name="id" value="<?= $post['id'] ?>" >
          <input type="text" id="titulo" name="titulo"  value="<?= $post['titulo'] ?>" placeholder="Título do Post"><br><br>
          <textarea id="texto" name="texto" rows="4" cols="50" placeholder="Texto do Post"><?= $post['texto'] ?></textarea><br><br>
          <input type="submit" name="salvar" value="Salvar">
          <?php }?>
        </form>
      </div>
    </div>
  </div>
</main>