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
    error_reporting(0);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $img = addslashes(file_get_contents('https://eaassets-a.akamaihd.net/battlelog/prod/emblem/236/734/320/2955060602438839644.png?v=1393499026'));

    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        echo "<div class='container'><h1>Недопустимая длина логина (нужно 5-90 символов)</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    } else if (mb_strlen($name) < 5 || mb_strlen($name) > 50) {
        echo "<div class='container'><h1>Недопустимая длина имени(нужно 3-50 символов)</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    } else if (mb_strlen($password) < 2 || mb_strlen($password) > 20) {
        echo "<div class='container'><h1>Недопустимая длина пароля (нужно 2-20 символов)</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    }

    $mysql = new mysqli('localhost', 'brawlerdem', 'Registerdb54', 'brawleraid');

    $unique = $mysql->query("SELECT * FROM `users` WHERE `login`  = '$login'");
    $arrayunique = $unique->fetch_assoc();
    if (count($arrayunique) > 0) {
        echo "<div class='container'><h1>Такой логин уже существует. сделайте другой.</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    } else {
        $mysql->query("INSERT INTO `users` (`login`, `password`, `name`, `img`)
    VALUES('$login', '$password', '$name', '$img')
    ");
    }

    $mysql->close();

    header('Location: /signin.php');
?>
</body>
</html>
