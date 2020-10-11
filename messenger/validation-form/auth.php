<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Проверка данных
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);


$mysql = new mysqli('localhost', 'brawlerdem', 'Registerdb54', 'brawleraid');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc();

if ($user == '') {
    echo "<div class='container'><h1>Такой пользователь отсутствует</h1>";
    echo "<br><a href='/signin.php'>Назад</a>";
    echo "<br><a href='/signup.php'>Зарегаться</a></div>";
    exit();
}
setcookie('user', $user['name'], time() + 3600 * 24 * 7, "/");
setcookie('login', $user['login'], time() + 3600 * 24 * 7, "/");
setcookie('password', $user['password'], time() + 3600 * 24 * 7, "/");
setcookie('id', $user['id'], time() + 3600 * 24 * 7, "/");
setcookie('img', $user['img'], time() + 3600 * 24 * 7, "/");

$mysql->close();

header('Location: /index.php');

?>
</body>
</html>
