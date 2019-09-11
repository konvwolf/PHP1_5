<?php

include ('.'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'const.php'); // константы сайта
include (ENGINE_PATH.'func.php'); // функции сайта
include (ENGINE_PATH.'post.php'); // передача данных в мускуль

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pictures</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Подключаю стили -->
    <?php foreach (scanDir4Files(STYLES_PATH) as $file): ?>
        <link rel="stylesheet" href="<?= STYLES_PATH.$file ?>">
    <?php endforeach; ?>
</head>
<body>
    <!-- Подключаю шаблон галереи -->
    <?php include (TEMPLATES_PATH.'gallery.php'); ?>

    <!-- Подключаю JS-скрипты -->
    <?php foreach (scanDir4Files(JS_PATH) as $file): ?>
        <script src="<?= JS_PATH.$file ?>"></script>
    <?php endforeach; ?>
</body>
</html>