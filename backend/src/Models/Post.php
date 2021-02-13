<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private int $author;
    private int $status;
    private int $category;
    private string $img;

    public static function all(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from posts');
        $initialPosts = $statement->fetchAll();

        return array_map(function ($initialPost) {
            $post = new self;
            $post->setId($initialPost['id']);
            $post->setTitle($initialPost['title']);
            $post->setContent($initialPost['content']);
            $post->setCategory($initialPost['category_id']);
            $post->setAuthor($initialPost['author_id']);
            $post->setImg($initialPost['img']);

            return $post;
        }, $initialPosts);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param int $author
     */
    public function setAuthor(int $author): void
    {
        $this->author = $author;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }
}