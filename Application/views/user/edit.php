<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2 text-center" style="margin-top:150px">
        <h2 style="float: left; margin-bottom: 25px;">Editando Usuário</h2>
        <a style="float: right; margin-top: 15px;" href="/user/">Voltar</a>
        <br><br>
        <hr>
      </div>
        <div class="col-8 offset-2 text-center" style="margin-top:20px; font-size: 22px;">
          <form method="post" action="/user/update" >
            <?php foreach ($data['user'] as $user) { ?>
          <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>">
          <input type="text" id="nome" name="nome" value="<?= $user['nome'] ?>" placeholder="Nome Completo"><br><br>
          <input type="text" id="usuario" name="usuario" value="<?= $user['usuario'] ?>" placeholder="Usuário"><br><br>
          <input type="email" id="email" name="email" value="<?= $user['email'] ?>" placeholder="Email"><br><br>
          <input type="password" id="senha" name="senha" placeholder="Nova Senha"><br><br>
          <input type="submit" name="salvar" value="Salvar">
          <?php }?>
        </form>
      </div>
    </div>
  </div>
</main>