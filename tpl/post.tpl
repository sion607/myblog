<h1><?=$this->post['title']?></h1>
<div>
    <?=$this->post['post'];?>
</div>
<?php if($this->user) { ?>
<span class="btn-group">
<a href="/?edit/<?=$this->post['post']?>" class="btn btn-sm glyphicon-pencil"> Редактировать </a>
<a href="/?del/<?=$this->post['post']?>" class="btn btn-sm btn-danger" onclick="return confirm('Точно удалить?');"><i class="glyphicon-trash">Удалить</i> </a></div>
    <?php } ?>
    </span>
<hr>
<div class="comment">
    <?php foreach ($this->comments as $c) { ?>
    <div class="comment"><b> <?=$c['name']?></b>: <?=$c['post']?>
        <?php if ($this->user) { ?> <a href="/?delComment/<?=$c['id']?>/<?=$this->post['id']?>" class="btn bnt-mini btn-danger" onclick="return confirm('Точно удалить?');" > <i class="glyphicon-trash">Удалить</i></a><?php }?>

        </div>
        <?php }?>
        <h4>Добавить комментарий:</h4>
        <form action="/?addComment/<?=$this->post['id']?>" class="form-inline well" method="post">
            <label>Имя</label><input type="text" name="name">
            <label>Комментарий</label>
            <input name="post" type="text">
            <button type="submit" class="btn bg-primary">Добавить</button>
        </form>
    </div>