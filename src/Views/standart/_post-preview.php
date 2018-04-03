<?php
/** @var array $post */
?>
<div style="margin: 20px 10px;">
    <h2><?= $post['title'] ?></h2>
    <p><?= $post['text'] ?></p>
    <p><a href="/<?= $post['alias'] ?>.html">Читать полностью</a></p>
</div>