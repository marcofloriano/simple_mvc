<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2 text-center" style="margin-top:150px">
        <h2 style="float: left; margin-bottom: 25px;">Criando Usuário</h2>
        <a style="float: right; margin-top: 15px;" href="/user/">Voltar</a>
        <br><br>
        <hr>
      </div>
      <div class="col-8 offset-2 text-center" style="margin-top:20px; font-size: 22px;">
        <form method="post" action="/user/insert" >
          <input type="text" id="nome" name="nome" placeholder="Nome Completo"><br><br>
          <input type="text" id="usuario" name="usuario" placeholder="Usuário para login" required><br><br>
          <input type="password" id="senha" name="senha" placeholder="Senha" required><br><br>
          <input type="email" id="email" name="email" placeholder="Email"><br><br>
          <input type="submit" name="salvar" value="Salvar">
        </form>
        <br><br>
      </div>
    </div>
  </div>
</main>