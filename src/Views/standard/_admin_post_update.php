<?php
/** @var array $postData */
/** @var array $categoryList */
?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/panel">Админка</a></li>
        <li class="breadcrumb-item"><a href="/admin/post">Управление постами</a></li>
        <li class="breadcrumb-item active">Редактирование поста #<?= $postData['id'] ?></li>
    </ol>

    <h1>Редактирование поста #<?= $postData['id'] ?></h1>
    <form method="post" name="create-post">
        <div class="form-group">
            <label for="title">Заголовок поста</label>
            <input class="form-control" id="title" value="<?= $postData['title'] ?? '' ?>" name="title">
        </div>

        <div class="form-group">
            <label for="title_seo">SEO заголовок</label>
            <input class="form-control" id="title_seo" value="<?= $postData['title_seo'] ?? '' ?>" name="title_seo">
        </div>

        <div class="form-group">
            <label for="meta_d">Meta описание</label>
            <textarea class="form-control" id="meta_d" name="meta_d"
                      rows="3"><?= $postData['meta_d'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
            <label for="meta_k">Ключевые слова</label>
            <input class="form-control" id="meta_k" name="meta_k" value="<?= $postData['meta_k'] ?? '' ?>">
        </div>


        <div class="form-group">
            <label for="preview_text">Превью текст</label>
            <textarea class="form-control" id="preview_text" name="preview_text"
                      rows="3"><?= $postData['preview_text'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control" id="text" name="text"><?= $postData['text'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
            <label for="alias">Alias</label>
            <input class="form-control" id="alias" value="<?= $postData['alias'] ?? '' ?>" name="alias">
        </div>

        <?php foreach ($categoryList as $category) : ?>

            <?php
            $checked = array_search($category['id'], $postData['categories']);
            ?>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category-<?= $category['id'] ?>" value="<?= $category['id'] ?>" <?= $checked !== false ? 'checked' : '' ?> name="categories[]">
                <label class="form-check-label" for="category-<?= $category['id'] ?>"><?= $category['title'] ?></label>
            </div>
        <?php endforeach; ?>

        <br><br>

        <div class="form-group">
            <label for="tags">Тэги (через запятую)</label>
            <textarea class="form-control" id="tags" name="tags"
                      rows="3"><?= $postData['tags'] ?? '' ?></textarea>
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