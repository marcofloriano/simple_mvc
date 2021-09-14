<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2 text-center" style="margin-top:150px">
        <h1 style="float: center; margin-bottom: -25px;">Login</h1>
        <br><br>
        <hr>
      </div>
      <div class="col-8 offset-2 text-center" style="margin-top:20px; font-size: 22px;">
        <form action="/login/authenticate" method="post">
          <label for="username">
            <i class="fas fa-user"></i>
          </label>
          <input type="text" id="username" name="username" placeholder="Username"  required>
          <br><br>
          <label for="password">
            <i class="fas fa-lock"></i>
          </label>
          <input type="password" id="password" name="password" placeholder="Password"  required>
          <br><br>
          <input type="submit" value="Entrar">
        </form>
      </div>
    </div>
  </div>
</main>