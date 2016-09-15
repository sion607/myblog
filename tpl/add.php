
<form class="form-horizontal" method="post">

    <label>Заголовок</label><br>
    <input type="text" class="input-lg" name="title" value="<?=@$this->post['title']?>"/>

<br>
<br>
    <label> Текст</label><br>
    <textarea name="post" class="input-lg" style="height: 300px "><?=@$this->post['post.tpl'] ?></textarea>
    <br>
    <div class="form-action"><button class="btn" type="submit">Добавить</button></div>
</form>