<?php
/** @var array $tagList */
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/panel">Админка</a></li>
    <li class="breadcrumb-item">Управление тегами</li>
</ol>

<p>
    <a class="btn btn-primary" style="color:#fff;" href="/admin/page/create">Создать страницу</a>
</p>

<table class="table">
    <tr>
        <th>id</th>
        <th>Заголовок</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($tagList as $tag) : ?>
        <tr>
            <td><?= $tag['id'] ?></td>
            <td><?= $tag['title'] ?></td>
            <td>
                <a href="/admin/tag/update/<?= $tag['id'] ?>"><i class="far fa-edit"></i></a>&nbsp;
                <a href="/admin/tag/delete/<?= $tag['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить пост?')">
                    <i class="far fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

