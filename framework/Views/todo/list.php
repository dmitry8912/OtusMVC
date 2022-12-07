<div>
    <form action="/Todo/add" method="post" enctype="multipart/form-data">
        <div>
            <div>
                <label for="title">Название:</label>
            </div>
            <div>
                <input type="text" id="title" name="title">
            </div>
            <div>
                <label for="descripion">Описание:</label>
            </div>
            <div>
                <textarea name="description" placeholder="Введите текст ToDo"></textarea>
            </div>
            <div>
                <input type="submit" value="Создать ToDo">
            </div>
        </div>
    </form>
</div>
<hr>
<div>
    <?php foreach($todoList as $item): ?>
        <h5><?php echo $item["title"] ?></h5>
        <?php echo $item["description"] ?>
        <div>
            <?php if(!$item['is_completed']): ?>
                <a href=/Todo/complete?todo_id=<?php echo $item["id"] ?>>Выполить</a> |
            <?php endif; ?>
            <a href=/Todo/delete?todo_id=<?php echo $item["id"] ?>>Удалить</a>
        </div>
    <? endforeach; ?>
</div>