<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $blog_post = [
            "Understanding the Basics of HTML" => " HTML (HyperText Markup Language) is the standard language for creating web pages. It provides the structure of a webpage and allows developers to include text, images, links, and more. Learn how to build your first webpage with this beginner-friendly guide.",
            "10 Tips for Writing Clean CSS" => "Writing clean and maintainable CSS can save you time and headaches. From using meaningful class names to organizing your stylesheets, these 10 tips will help you create efficient and readable CSS for your projects.",
            "Getting Started with JavaScript" => "JavaScript is a powerful programming language that allows developers to add interactivity to websites. This guide will walk you through the basics, including variables, functions, and event handling, to help you start your JavaScript journey."
        ];

        foreach ($blog_post as $key => $value) {
            Post::create([
                "title" => $key,
                "content" => $value
            ]);
        }
    }
}
