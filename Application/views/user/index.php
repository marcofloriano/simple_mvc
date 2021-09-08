<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2 text-center" style="margin-top:150px">
        <h2 style="float: left; margin-bottom: 25px;">Gerenciando Usuários</h2>
        <a style="float: right; margin-top: 15px;" href="/user/create/">Adicionar Usuário</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['users'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>
              <td> <a href="/user/show/<?= $user['id'] ?>">Ver</a> | <a href="/user/edit/<?= $user['id'] ?>">Editar</a> | <a href="/user/delete/<?= $user['id'] ?>">Remover</a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>