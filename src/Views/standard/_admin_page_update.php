<?php
/** @var array $pageFields */
/** @var array $categoryList */
?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/panel">Админка</a></li>
        <li class="breadcrumb-item"><a href="/admin/page">Управление страницами</a></li>
        <li class="breadcrumb-item active">Редактирование страницы #<?= $pageFields['id'] ?></li>
    </ol>

    <h1>Редактирование страницы #<?= $pageFields['id'] ?></h1>
    <form method="post" name="create-post">
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input class="form-control" id="title" value="<?= $pageFields['title'] ?? '' ?>" name="title">
        </div>

        <div class="form-group">
            <label for="title_seo">SEO заголовок</label>
            <input class="form-control" id="title_seo" value="<?= $pageFields['title_seo'] ?? '' ?>" name="title_seo">
        </div>

        <div class="form-group">
            <label for="meta_d">Meta описание</label>
            <textarea class="form-control" id="meta_d" name="meta_d"
                      rows="3"><?= $pageFields['meta_d'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
            <label for="meta_k">Ключевые слова</label>
            <input class="form-control" id="meta_k" name="meta_k" value="<?= $pageFields['meta_k'] ?? '' ?>">
        </div>


        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control" id="text" name="text"><?= $pageFields['text'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
            <label for="alias">Alias</label>
            <input class="form-control" id="alias" value="<?= $pageFields['alias'] ?? '' ?>" name="alias">
        </div>

        <br>
        <button class="btn btn-primary">Сохранить</button>
    </form>


<?php

$moreJs .= '<script type="text/javascript" src="/standard/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/standard/ckeditor/adapters/jquery.js"></script>
<script>
    $(document).ready(function () {
        $("#text").ckeditor();
    });
</script>';

?>