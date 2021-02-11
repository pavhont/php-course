<?php

namespace It20Academy\App\Controllers;

use It20Academy\App\Models\Post;

class PostsController
{
    public function index()
    {
        $posts = Post::all();

        dump($posts);
    }
}