<?php
/** @var array $categoryList[] */
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/panel">Админка</a></li>
    <li class="breadcrumb-item">Управление категориями</li>
</ol>

<p>
    <a class="btn btn-primary" style="color:#fff;" href="/admin/category/create">Создать категорию</a>
</p>

<table class="table">
    <tr>
        <th>id</th>
        <th>Заголовок</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($categoryList as $category) : ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['title'] ?></td>
            <td>
                <a href="/admin/category/update/<?= $category['id'] ?>"><i class="far fa-edit"></i></a>&nbsp;
                <a href="/admin/category/delete/<?= $category['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить категорию?')">
                    <i class="far fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

