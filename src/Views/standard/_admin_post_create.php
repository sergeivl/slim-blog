<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/panel">Админка</a></li>
    <li class="breadcrumb-item"><a href="/admin/post">Управление постами</a></li>
    <li class="breadcrumb-item active">Создание поста</li>
</ol>

<h1>Создание нового поста</h1>
<form method="post" name="create-post">
    <div class="form-group">
        <label for="title">Заголовок поста</label>
        <input class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="title_seo">SEO заголовок</label>
        <input class="form-control" id="title_seo" name="title_seo">
    </div>

    <div class="form-group">
        <label for="meta_d">Meta описание</label>
        <textarea class="form-control" id="meta_d" name="meta_d" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="meta_k">Ключевые слова</label>
        <input class="form-control" id="meta_k" name="meta_k">
    </div>


    <div class="form-group">
        <label for="preview_text">Превью текст</label>
        <textarea class="form-control" id="preview_text" name="preview_text" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="text">Текст</label>
        <textarea class="form-control" id="text" name="text"></textarea>
    </div>

    <div class="form-group">
        <label for="alias">Alias</label>
        <input class="form-control" id="alias" name="alias">
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
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