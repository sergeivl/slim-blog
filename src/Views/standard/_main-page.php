<?php
/** @var array $pageData  */
?>

<h1><?= $pageData['title_seo'] ? $pageData['title_seo'] : $pageData['title'] ?></h1>

<?= $pageData['text'] ?>

<?php require '_post-list.php' ?>
<?php require '_pagination.php' ?>