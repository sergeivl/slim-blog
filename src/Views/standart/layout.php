<?php
/** @var string $subtemplate  */
/** @var string $textLogo  */
/** @var array $pageData  */
/** @var array $categoryList */
/** @var array $tagList */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $pageData['meta_d'] ?>">
    <meta name="author" content="">
    <link rel="icon" href="">

    <link rel="icon" type="image/png" href="/standart/img/favicon.png">

    <title><?= $pageData['title_seo'] ? $pageData['title_seo'] : $pageData['title'] ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/dracula.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

    <link rel="stylesheet" href="/standart/css/style.css">



</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 svl-menu">
    <a class="navbar-brand svl-logo" href="/"><?= $textLogo ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/page/file-profit">File-Profit</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/page/about">О себе</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/page/contact">Контакт</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Что ищем?" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>




<div class="container-fluid">
    <div class="row">

        <nav class="sidebar svl-sidebar">

            <div class="sidebar-sticky">
                <h2>Категории</h2>
                <ul class="nav flex-column">
                    <?php foreach ($categoryList as $category) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="/<?= $category['alias'] ?>">
                                <?= $category['title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                    <?php /*
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                        </a>
                    </li>
                    */ ?>
                </ul>
            </div>


            <div class="sidebar-sticky">
                <h2>Теги</h2>
                <ul class="nav flex-column">
                    <?php foreach ($tagList as $tag) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="/tag/<?= $tag['alias'] ?>">
                                <?= $tag['title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                    <?php /*
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                        </a>
                    </li>
                    */ ?>
                </ul>
            </div>


        </nav>

        <main role="main" class="col-md-9 col-lg-9 pt-3 px-4 svl-main">
            <div class="main-content">
                <?php require  '_' . $subtemplate . '.php' ?>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>


</body>
</html>
