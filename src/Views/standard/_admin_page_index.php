<?php
/** @var array $pageList */
?>

<p>
    <a class="btn btn-primary" style="color:#fff;" href="/admin/page/create">Создать страницу</a>
</p>

<table class="table">
    <tr>
        <th>id</th>
        <th>Заголовок</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($pageList as $page) : ?>
        <tr>
            <td><?= $page['id'] ?></td>
            <td><?= $page['title'] ?></td>
            <td>
                <a href="/admin/page/update/<?= $page['id'] ?>"><i class="far fa-edit"></i></a>&nbsp;
                <a href="/admin/page/delete/<?= $page['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить пост?')">
                    <i class="far fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

