<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Петрова Д.А</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/button.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
<div class="max-w-4xl mx-auto p-6">
    <div class="text-center mb-8">
        <div class="flex justify-center items-center mb-0">
            <img src="src/img/owl.png" alt="Иконка" class="w-16 h-16">
        </div>
        <h1 class="text-4xl font-bold text-blue-700">Коротко обо мне!</h1>
    </div>

    <div class="grid grid-cols-3 gap-4 items-center">
        <div class="col-span-2">
            <p class="text-lg leading-relaxed text-justify">
                <span class="font-bold">Петрова Дарья</span>, преподаватель математики в школе и аналитик по жизни!
                Дайте мне классную доску и кусок мела, и я из любого ученика сделаю прирождённого решателя логических задач.
                Человек без задач – это как формула без переменных! Я пришла в этот мир не для того, чтобы засыпать вас учебниками,
                а чтобы научить мыслить, считать и анализировать всё вокруг.
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-48 h-48 rounded-full overflow-hidden shadow-lg mb-4">
                <img
                        src="src/img/me.jpeg"
                        alt="Картинка"
                        class="w-full h-full object-cover"
                >
            </div>
            <p class="text-xl font-medium text-gray-700">Петрова Д.А</p>
        </div>
    </div>
    <div class="text-center mt-8">
        <button id="toggleButton" class="bg-blue-500 text-white py-2 px-4 rounded shadow-md hover:bg-blue-600">
            Показать картинку
        </button>
        <div class="mt-4">
            <img id="image" src="src/img/smile.png" alt="Пример" class="hidden mx-auto rounded w-32 h-32">
        </div>
    </div>
</div>

<div class="flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Привет, <?php echo $_COOKIE['User']; ?></h1>
        <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload" class="space-y-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Заголовок вашего поста</label>
                <input type="text" id="title" name="title" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="text" class="block text-sm font-medium text-gray-700">Текст вашего поста</label>
                <textarea id="text" name="text" required
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </textarea>
            </div>
            <input type="file" name="file" /><br>
            <div>
                <button type="submit" name="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Опубликовать пост!
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', 'root', 'db');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $image_name = null;
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
            $image_name = $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

    $sql = "INSERT INTO posts (title, main_text, image_name) VALUES ('$title', '$main_text', '$image_name')";
    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    mysqli_close($link);
}
?>