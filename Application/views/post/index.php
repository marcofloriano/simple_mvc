<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <h2>Posts</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Título</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['posts'] as $post) { ?>
            <tr>
              <td><?= $post['id'] ?></td>
              <td><?= $post['titulo'] ?></td>
              <td> <a href="/post/show/<?= $post['id'] ?>">Ver</a> | <a href="/post/edit/<?= $post['id'] ?>">Editar</a> | <a href="/post/delete/<?= $post['id'] ?>">Remover</a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <a href="/post/create">Adicionar Post</a>
      </div>
    </div>
  </div>
</main>