<?php
$link = mysqli_connect('127.0.0.1', 'root', 'root', 'db');
$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=$id";

$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
$image_name = $rows['image_name']

?>

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
        <h1 class="text-4xl font-bold text-blue-700">
            <?php echo $title ?>
        </h1>
        <?php echo $main_text ?>
        <div class="mt-4">
            <img id="image" src="/upload/<?php echo $image_name?>" alt="Пример" class="hidden mx-auto rounded w-32 h-32">
        </div>
    </div>
</body>
</html>