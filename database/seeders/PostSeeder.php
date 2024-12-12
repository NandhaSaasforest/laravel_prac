<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $blogPost = [
            "Understanding the Basics of HTML" => " HTML (HyperText Markup Language) is the standard language for creating web pages. ",
            "10 Tips for Writing Clean CSS" => "Writing clean and maintainable CSS can save you time and headaches.",
            "Getting Started with JavaScript" => "JavaScript is a powerful programming language that allows developers to add interactivity to websites."
        ];

        foreach ($blogPost as $key => $value) {
            Post::create([
                "title" => $key,
                "content" => $value
            ]);
        }
    }
}
