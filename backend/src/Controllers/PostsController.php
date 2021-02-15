<?php

namespace It20Academy\App\Controllers;

use It20Academy\App\Core\View;
use It20Academy\App\Models\Post;

class PostsController
{
    public function index()
    {
        $posts = Post::all();

        echo View::render('posts-index', compact('posts'));
    }

    public function create()
    {
        echo View::render('posts-create');
    }

    public function store()
    {
        //Определяем место сохранения загруженного файла и его имя
        $destination = __DIR__ . './../../storage/uploads';
        $fileTempName = $_FILES['file_name']['tmp_name'];

        if (is_uploaded_file($fileTempName)) {
            //Проверяем тип файла и меняем его имя в соответствии
            $newFilename = $destination .'/user';

            switch ($_FILES['file_name']['type']) {
                case 'application/pdf':
                    $newFilename .= '-document.pdf';
                    break;

                case 'video/mp4':
                    $newFilename .= '-video.mp4';
                    break;

                case 'image/jpeg':
                    $newFilename .= '-img.jpg';
                    break;

                default:
                    echo 'Файл неподдерживаемого типа';
                    exit;
            }

            //Перемещаем файл из временной папки в указанную
            if (move_uploaded_file($fileTempName, $newFilename)) {
                echo 'Файл сохранен под именем '. $newFilename;

            } else {
                echo 'Не удалось осуществить сохранение файла';
            }
        } else {
            echo 'Файл не был загружен на сервер';
        }
    }
}