<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Título</th>
              <th scope="col">Texto</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['post'] as $post) { ?>
            <tr>
              <td><?= $post['id'] ?></td>
              <td><?= $post['titulo'] ?></td>
              <td><?= $post['texto'] ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>