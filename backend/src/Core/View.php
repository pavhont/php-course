<?php

namespace It20Academy\App\Core;

class View
{
    public static function render(string $view, array $data = [])
    {
        $viewPath = __DIR__ . "/../../views/{$view}.tpl.php";

        if (file_exists($viewPath)) {
            include $viewPath;
        }
    }
}