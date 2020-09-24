<? view('includes/header') ?>
    <div class="container">
      <h1>Admin login</h1>
      <form action="/admin/login" method="POST">
        <div class="form-group">
          <label for="username">Имя пользователя</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Пароль</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
      </form>
    </div>
    <br>
<? view('includes/footer') ?>