<div>
<h1>Посты :</h1>
<?php foreach ($this->posts as $key => $value){?>

<h2><a href="/?post/<?=$value['id']?>"><?=$value['title']?></a></h2>
<div><?=$value['post']?></div>
    <div>
        <?php if($this->user) { ?>
        <span class="btn-group"></span>
        <a href="/?edit/<?=$value['id']?>" class="btn btn-sm glyphicon-pencil"> Редактировать </a>
<a href="/?del/<?=$value['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Точно удалить?');"><i class="glyphicon-trash">Удалить</i> </a></div>
    </span>
<?php } ?>
<?php } ?>
</div>
