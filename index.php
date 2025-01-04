<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Петрова Д.А</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <div>
        <h1 class="text-4xl font-bold text-blue-700">Авторизуйтесь!</h1>
        <?php
        if (!isset($_COOKIE['User'])) {
        ?>
        <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>, чтобы просматривать контент!
        <?php
            } else {
                // подключение к БД
            }
        ?>
    </div>
</body>
</html>