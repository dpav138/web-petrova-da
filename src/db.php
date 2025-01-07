<?php
$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbName = getenv('DB_DATABASE');

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать БД";
}

mysqli_close($link);


$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
  id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(20) NOT NULL
)";

if(!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу Users";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
  id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(30) NOT NULL,
  main_text VARCHAR(150) NOT NULL,
  image_name VARCHAR(30)
)";

if(!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу Posts";
}

mysqli_close($link);
?>