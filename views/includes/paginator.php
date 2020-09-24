<nav>
  <ul class="pagination">
	<? if($page == 1) { ?>
		<li class="page-item disabled"><a class="page-link">Назад</a></li>
	<? }else { ?>
		<li class="page-item"><a class="page-link" href="<?=paramsUpdateUri('page', $page-1) ?>">Назад</a></li>
	<? } ?>

    <? for ($i=1; $i<=$pages; $i++) { ?>
    	<? if($i == $page) {?>
    		<li class="page-item active"><a class="page-link"><?=$i ?></a></li>
    	<? }else { ?>
    		<li class="page-item"><a class="page-link" href="<?=paramsUpdateUri('page', $i) ?>"><?=$i ?></a></li>
    	<? } ?>
    <? } ?>

    <? if($page == $pages) { ?>
    	<li class="page-item disabled"><a class="page-link">Вперед</a></li>
    <? }else { ?>
    	<li class="page-item"><a class="page-link" href="<?=paramsUpdateUri('page', $page+1) ?>">Вперед</a></li>
    <? } ?>
  </ul>
</nav>