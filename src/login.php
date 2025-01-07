<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Петрова Д.А</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Войти</h1>
        <form method="POST" action="login.php" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Логин</label>
                <input type="text" id="username" name="username" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <button type="submit" name="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Продолжить
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}

require_once('db.php');

$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbName = getenv('DB_DATABASE');

$link = mysqli_connect($servername, $username, $password, $dbName);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ( !$username || !$password) die ('Пожалуйста введите все значения!');

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";

    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $username, time()+7200);
        header('Location: profile.php');
    } else {
        echo "не правильное имя или пароль";
    }
    mysqli_close($link);
}
?>