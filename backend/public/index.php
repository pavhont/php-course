<?php

require_once '../vendor/autoload.php';

use \It20Academy\App\Core\App;

$app = new App();

$app->run();

//========== Запись данных в файл ============

/**
 * w+ - открытие файла для чтения и записи, помещает указатель в начало файла
 * и обрезает файл до нулевой длины.
 * если файл не существует, пытается его создать
 *
 * fopen() - Открывает файл или URL
 * @url https://www.php.net/manual/ru/function.fopen.php
 *
 * fwrite() — Бинарно-безопасная запись в файл
 * @url https://www.php.net/manual/ru/function.fwrite.php
 *
 * fclose() — Закрывает открытый дескриптор файла
 * @url https://www.php.net/manual/ru/function.fclose.php
 *
 */
$file = fopen('./../storage/file.txt', "a+");

if (! $file) {
    echo 'Ошибка открытия файла';
} else {
    fwrite($file, 'Test String' . PHP_EOL);
    fclose($file);
}