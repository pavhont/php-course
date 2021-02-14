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

//========== Чтение данных из файла ============

$file = fopen('./../storage/file.txt', "r");

// Буфферная переменная обьявляется, т.к. чтение идет последовательно
$buffer = '';

/**
 * feof() - будет проверять, что мы не дошли до конца файла
 * @url https://www.php.net/manual/ru/function.feof.php
 *
 * fread() - Бинарно-безопасное чтение файла
 * @url https://www.php.net/manual/ru/function.fread.php
 *
 */
while (! feof($file)) {
    $buffer .= fread($file, 1);
}

// этот вариант опасен, если размеры файлов большие
// $buffer = fread($file, filesize($file));

echo $buffer;
fclose($file);


//========== Сокращенные варианты для работы с файлами ============

/**
 * file_put_contents() - Пишет данные в файл
 * @url https://www.php.net/manual/ru/function.file-put-contents.php
 */
file_put_contents('./../storage/new_file.txt', 'New string' . PHP_EOL);

/**
 * file_get_contents() - Читает содержимое файла в строку
 * @url https://www.php.net/manual/ru/function.file-get-contents.php
 */
echo file_get_contents('./../storage/new_file.txt');



//========== Удаление файла ============

/**
 * unlink() — Удаляет файл
 *
 * @url https://www.php.net/manual/ru/function.unlink.php
 */
//unlink('./../storage/new_file.txt');

dump(file_exists('./../storage/new_file.txt'));



//========== Сохранение данных из файла в массив ============

/**
 * file() — Читает содержимое файла и помещает его в массив
 *
 * @url https://www.php.net/manual/ru/function.file.php
 */
$arr = file('./../storage/file.txt');

dump($arr);