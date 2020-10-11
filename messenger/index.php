<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Главная
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<!--ШАПКА САЙТА-->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h4 class="my-0 mr-md-auto font-weight-normal">Марюсчат</h4>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-grey" href="index.php">Главная</a>
        <a class="p-2 text-dark" href="about.php">Контакты</a>
    </nav>
    <?php
    if (@$_COOKIE['user'] == ''):
    ?>
    <a class="btn btn-outline-primary" href="signin.php">Войти</a>
    <?php
    else:
    ?>
    <a class="p-2 text-dark" href="profile.php">Профиль</a>
    <?php
    endif;
    ?>
</div>




<div class="container">
    <?php
    if (@$_COOKIE['user'] == ''):
    ?>
        <h2><a href="signin.php">Войдите</a> или <a href="signup.php">зарегистрируйтесь</a>, чтобы просматривать контент</h2>

    <?php
    else:
    ?>
        <h1>Добро пожаловать, <?=$_COOKIE['user']?>, в Марюсчат</h1>
        <div class="container">
            <center>
            <form method="post" action="validation-form/publish.php" enctype="multipart/form-data">
                <input type="file" name="inputimg">
                <input type="submit">
            </form>
            </center>
        </div>
    <hr>
    <div class="container">
        <?php
                $connect = new mysqli('localhost', 'brawlerdem', 'Registerdb54', 'brawleraid');
                $r = $connect->query("SELECT * FROM `messages`");
                foreach ($r as $rw) {

                    $user = $rw['username'];
                    $message = $rw['message'];
                    $req = $connect->query("SELECT `img` FROM `users` WHERE `users`.`name` = '$user'");
                    $row = $req -> fetch_assoc();
                    echo '<p><img src="data:image/jpeg;base64,'.base64_encode( $row['img']).'" width=20px height=20px/>'."<b>$user:</b> </p>";
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $message).'" width=200px height=200px/>';


                }
        ?>
    </div>


    <?php
    endif;
    ?>
</div>


</body>
</html>