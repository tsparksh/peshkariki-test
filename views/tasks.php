<? view('includes/header') ?>
    <div class="container">
      <h1>TODO list:</h1>
      <? foreach ($tasks as $task) { ?>
        <div class="alert alert-warning">
          <?=$task['id'] ?>. <strong><a href="mailto:<?=$task['email'] ?>"><?=$task['username'] ?></a></strong> <?=$task['text'] ?>
          <? if($task['completed']) { ?>
            <span class="badge badge-pill badge-primary">Done</span>
          <? } ?>
        </div>
      <? } ?>
      <br>
      <? drawPaginator($pages, $page) ?>
      <br>
      <form action="/task/create" method="POST">
        <? /* TODO: Добавить csrf токен */ ?>
        <div class="form-group">
          <label for="username">Имя</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="text">Текст</label>
          <textarea class="form-control" id="text" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
    </div>
    <br>
<? view('includes/footer') ?>