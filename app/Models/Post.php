<?php
namespace App\Models;


class Post {

    /**
     * 
     */
    public static function find($slug) {
        // $path = __DIR__ . '/../resources/posts/' . $slug . '.html';
        if(!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    }
}