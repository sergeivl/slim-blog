<?php
/** @var array $postList */
/** @var array $paginator */
?>

<p>
    <a class="btn btn-primary" style="color:#fff;" href="/admin/post/create">Создать пост</a>
</p>

<table class="table">
    <tr>
        <th>id</th>
        <th>Заголовок</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($postList as $post) : ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= $post['title'] ?></td>
            <td>
                <a href="/admin/post/update/<?= $post['id'] ?>"><i class="far fa-edit"></i></a>&nbsp;
                <a href="/admin/post/delete/<?= $post['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить пост?')">
                    <i class="far fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $paginator ?>
