<?php
/** @var $errors */
if ($errors['auth']):
?>
    <p class="alert alert-danger">Не верное имя пользотеля и пароль</p>
<?php
endif;
?>

<form method="post" action="/user/login" name="login-form">
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Ваш Email">
    </div>

    <?php /*
    <div class="form-group">
        <label for="inputName">Имя</label>
        <input class="form-control" id="inputName" name="name" aria-describedby="emailHelp" placeholder="Ваш Email">
    </div>
    */ ?>

    <div class="form-group">
        <label for="inputPassword">Пароль</label>
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Придумайте пароль">
    </div>

    <div class="form-check" style="margin-bottom: 20px;">
        <input type="checkbox" class="form-check-input" id="inputRemember" name="remember">
        <label class="form-check-label" for="inputRemember">Запомнить меня</label>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>
