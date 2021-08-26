<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <h2>Criar Post</h2>
        <br>
        <form method="post" action="/post/insert" >
          <input type="text" id="titulo" name="titulo" placeholder="Título do Post"><br><br>
          <textarea id="texto" name="texto" rows="4" cols="50" placeholder="Texto do Post"></textarea><br><br>
          <input type="submit" name="salvar" value="Salvar">
        </form>
      </div>
    </div>
  </div>
</main>