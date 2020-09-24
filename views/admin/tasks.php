<? view('includes/header') ?>
    <div class="container">
      <h1>Admin Panel:</h1>
      <? foreach ($tasks as $task) { ?>
        <div class="alert alert-warning">
          <form action="/task/update" method="POST">
            <? /* TODO: Добавить csrf токен */ ?>
            <div class="form-group">
              <label for="text"><strong><?=$task['username'] ?></strong> (<?=$task['email'] ?>)</label>
              <textarea class="form-control" id="text" name="text"><?=$task['text'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="completed">Завершен?</label>
              <input type="checkbox" id="completed" name="completed" <? if($task['completed']) echo 'checked' ?>>
            </div>
            <input type="hidden" name="id" value="<?=$task['id'] ?>">
            <button type="submit" class="btn btn-primary">Отправить</button>
          </form>
        </div>
      <? } ?>
      <br>
      <? drawPaginator($pages, $page) ?>
      <br>
    </div>
    <br>
<? view('includes/footer') ?>