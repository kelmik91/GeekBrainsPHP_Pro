<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?if ($auth):?>
    Добро пожаловать <?=$username?> <a href="/auth/logout/"> [Выход]</a>
<?else:?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <input type="submit" name="submit" value="Войти">
    </form>
<?endif;?><br>
<?=$menu?>
<?=$content?>
</body>
</html>