<? view('includes/header') ?>
    <div class="container">
      <h1>TODO list:</h1>
      <form class="form-inline">
        <div class="form-group mb-2">
          <div class="form-control-plaintext">Сортировать по</div>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <select class="form-control" name="orderBy">
            <option value="id">ID</option>
            <option value="email">Email</option>
            <option value="completed">Статусу</option>
          </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <select class="form-control" name="direction">
            <option value="asc">0->9</option>
            <option value="desc">9->0</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Отсортировать</button>
      </form>
      <br>
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