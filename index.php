<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Page</title>
</head>
<body>
<h1> Данные передаются в URL как часть запроса, поэтому они видны в адресной строке браузера и в истории браузера.
     Из-за этого не рекомендую передавать важную информацию (например, пароли) через метод GET.
     Так же данные размер данных ограничен и результаты запроса могут кэшироваться<h1>
<form action="index.php" method="get">
    <input type="text" name="param1">
    <input type="text" name="param2">
    <input type="text" name="param3">
    <input type="submit" value="Отправить GET запрос">
</form>
<h1> Данные передаются в теле HTTP-запроса. Их нельзя увидеть в адресной строке браузера, 
     поэтому метод POST предпочтителен при передаче важных данных.
     Ограничение размера данных зависит от настроек сервера и/или браузера.
     Результаты запросов не кэшируются<h1>
<form action="index.php" method="post">
    <input type="text" name="login" placeholder="Login">
    <input type="text" name="Name" placeholder="Name">
    <input type="text" name="Surname" placeholder="Surname">
    <input type="submit" value="Отправить POST запрос">
</form>


<?php

// Проверяем наличие параметров в GET и POST методах
if (empty($_GET) && empty($_POST)) {
    echo "<h1>Введите данные</h1>";
} elseif (!empty($_GET)) { // Если есть параметры в GET методе
    // Проверяем наличие необходимых параметров
    if (isset($_GET["param1"]) && isset($_GET["param2"]) && isset($_GET["param3"])) {
        $param1 = $_GET["param1"];
        $param2 = $_GET["param2"];
        $param3 = $_GET["param3"];
        echo "<h1>Параметры GET: $param1, $param2, $param3</h1>";
    } else {    
        echo "<h1>Недостаточно параметров в запросе GET.<br>
        При желании введите данные снова</h1>";
    }
} elseif (!empty($_POST)) { // Если есть параметры в POST методе
    // Проверяем наличие необходимых параметров
    if (isset($_POST["login"]) && isset($_POST["Name"]) && isset($_POST["Surname"])) {
        $login = $_POST["login"];
        $name = $_POST["Name"];
        $surname = $_POST["Surname"];
        echo "<h1>Параметры POST: $login, $name, $surname</h1>";
    } else {
        echo "<h1>Недостаточно параметров в запросе POST.<br>
        При желании введите данные снова</h1>";
    }
} else {
    echo "<h1>Введите данные</h1>";
}
?>
</body>
</html>
