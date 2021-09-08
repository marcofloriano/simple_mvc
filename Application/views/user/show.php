<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2 text-center" style="margin-top:150px">
        <h2 style="float: left; margin-bottom: 25px;">Visualizando Usuário</h2>
        <a style="float: right; margin-top: 15px;" href="/user/">Voltar</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['user'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>