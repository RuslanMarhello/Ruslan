<?php
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 5  mb_strlen($login) > 90) {
        echo "Недопустимое длина логина";
        exit();
    }
    if(mb_strlen($pass) < 1  mb_strlen($pass) > 6) {
        echo "Недопустимое длина пароля";
        exit();
    }

    $pass = md5($pass."rus1705");

    $mysql = new mysqli('127.0.0.1', 'root', 'root', 'photos2');
    $mysql->query("INSERT INTO `users` (`login`, `pass`) 
    VALUES('$login', '$pass')");

    $mysql->close();

    header('Location: /');
?>