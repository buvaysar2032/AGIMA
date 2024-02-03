<?php

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, все ли поля заполнены
    if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["rating"]) && !empty($_POST["comment"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $rating = $_POST["rating"];
        $comment = $_POST["comment"];

        // Проводим базовую валидацию данных
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($username) <= 15 && $rating >= 0 && $rating <= 5 && strlen($comment) <= 200) {
            // Сохраняем данные в текстовый файл
            $data = "Имя: $username\nEmail: $email\nОценка: $rating\nКомментарий: $comment\n\n";
            file_put_contents("feedback.txt", $data, FILE_APPEND);

            echo "Спасибо за ваше сообщение!";
        } else {
            // Выводим сообщение об ошибке, если данные не корректны
            echo "Ошибка: ";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Неправильный формат email. ";
            }
            if (strlen($username) > 15) {
                echo "Имя пользователя должно содержать не более 15 символов. ";
            }
            if ($rating < 0 || $rating > 5) {
                echo "Оценка страницы должна быть от 0 до 5. ";
            }
            if (strlen($comment) > 200) {
                echo "Комментарий должен содержать не более 200 символов. ";
            }
        }
    } else {
        echo "Ошибка: Пожалуйста, заполните все поля.";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма обратной связи</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" maxlength="15" >

        <label for="email">Электронная почта:</label>
        <input type="email" id="email" name="email" >

        <label for="rating">Оценка страницы (от 0 до 5):</label>
        <input type="number" id="rating" name="rating" min="0" max="5" >

        <label for="comment">Комментарий:</label>
        <textarea id="comment" name="comment" maxlength="200" ></textarea>

        <button type="submit">Отправить</button>
    </form>
</body>
</html>