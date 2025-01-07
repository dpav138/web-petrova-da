<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Петрова Д.А</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-blue-700">Посты пользователей</h1>
        <?php
        if (!isset($_COOKIE['User'])) {
        ?>
        <a class="text-bold text-blue-700" href="registration.php">Зарегистрируйтесь</a> или <a class="text-bold text-blue-700" href="login.php">войдите</a>, чтобы просматривать контент!
        <?php
            } else {
                $servername = getenv('DB_HOST');
                $username = getenv('DB_USER');
                $password = getenv('DB_PASSWORD');
                $dbName = getenv('DB_DATABASE');

                $link = mysqli_connect($servername, $username, $password, $dbName);

                $sql = "SELECT * FROM posts";
                $res = mysqli_query($link, $sql);

                if (mysqli_num_rows($res) >  0) {
                    while ($post = mysqli_fetch_array($res)) {
                        echo "<a href='posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                    }
                } else {
                    echo "Записей пока нет";
                }
            }
            mysqli_close($link);
        ?>
    </div>
</body>
</html>