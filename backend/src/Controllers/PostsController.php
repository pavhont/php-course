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
}