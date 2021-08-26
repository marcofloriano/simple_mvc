<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <h2>Editar Usuário</h2>
        <br>
        <form method="post" action="/user/update" >
          <?php foreach ($data['user'] as $user) { ?>
          <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>">
          <input type="text" id="nome" name="nome" value="<?= $user['nome'] ?>" placeholder="Nome do usuário"><br><br>
          <input type="submit" name="salvar" value="Salvar">
          <?php }?>
        </form>
      </div>
    </div>
  </div>
</main>