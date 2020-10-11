<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Проверка данных
    </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<?php
$newlogin = filter_var(trim($_POST['newlogin']), FILTER_SANITIZE_STRING);
$newname = filter_var(trim($_POST['newname']), FILTER_SANITIZE_STRING);
$newpassword = filter_var(trim($_POST['newpassword']), FILTER_SANITIZE_STRING);


$mysql = new mysqli('localhost', 'brawlerdem', 'Registerdb54', 'brawleraid');
$id = $_COOKIE['id'];
$mysql->query("UPDATE `users` SET `login` = '$newlogin' WHERE `users`.`id` = '$id'");
$mysql->query("UPDATE `users` SET `name` = '$newname' WHERE `users`.`id` = '$id'");
$mysql->query("UPDATE `users` SET `password` = '$newpassword' WHERE `users`.`id` = '$id'");




$mysql->close();

header('Location: /signin.php');
?>
</body>
</html>