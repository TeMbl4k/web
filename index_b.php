<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Данные</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 20px;
        }

        p{
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            font-style: italic;
            color: #ff0000;
            margin-bottom: 10px;
        }

        .user-image,    
        .admin-image {
            max-width: 1000px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Введите свой логин и пароль, чтобы попасть на сайт</h1>
    <p>Если вы админ, вы будете перенаправленны на admin_panel.<br>Иначе, вы будете перенаправленны на сайт с картинкой.</p>

    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>

    <?php

    
    if (empty($_POST)) {
        echo '<div class="message">Введите логин и пароль</div>';
    } else {

        if (!headers_sent()) {
            foreach (headers_list() as $header)
              header_remove($header);
        }

        $name = $_POST["name"];
        $pass = $_POST["pass"];
        switch(true) {
            case $name == "admin" && $pass == "admin":
                echo "<div class='message'>Вы АДМИН!</div>";
                echo '<img src="admin_image.jpg" alt="Admin Image" class="admin-image">';
                break;
            case $name == "admin" && $pass == "site":
                header("Location: admin.php");
                exit;
            case $name == "tembl4" && $pass == "pass":
                echo "<div class='message'>Вы обычный пользователь - TeMbl4!</div>";
                echo '<img src="user_image.jpg" alt="User Image" class="user-image">';
                break;
            default:
                echo "<div class='message'>Неправильный логин или пароль!</div>";
                echo '<img src="user_image.jpg" alt="User Image" class="user-image">';
        }
    }
    ?>
</body>
</html>
