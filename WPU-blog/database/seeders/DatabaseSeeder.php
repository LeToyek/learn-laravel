<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "maulana arif",
            "email" => "maulana@gmail.com",
            "password" => bcrypt("awikwok"),
        ]);
        Category::create([
            "name" => "Web-Programming",
            "slug" => "web-programming",
        ]);
        Category::create([
            "name" => "Personal",
            "slug" => "personal",
        ]);
        // Post::create([
        //     "title" => "Judul Pertama",
        //     "slug" => "judul-pertama",
        //     "excerpt" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga possimus ea expedita atque accusamus similique eligendi laboriosam error maxime et.",
        //     "body" => "<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius iure dignissimos corporis, facere quidem fugit dolor illo magni repudiandae. Eaque ea quam nemo deleniti labore excepturi sequi numquam veritatis possimus aperiam iure alias nobis, minima beatae accusamus? Magnam aliquam earum neque commodi, quod veniam odio nisi placeat eum voluptatibus esse.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, hic soluta! Voluptate ullam dolorum dolore, qui, assumenda corporis exercitationem enim sunt animi unde molestiae optio at quam veniam explicabo odit.</p>"
        //     ,"category_id" =>1,
        //     "user_id" => 1,
        // ]);
        // Post::create([
        //     "title" => "Judul Kedua",
        //     "slug" => "judul-kedua",
        //     "excerpt" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga possimus ea expedita atque accusamus similique eligendi laboriosam error maxime et.",
        //     "body" => "<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius iure dignissimos corporis, facere quidem fugit dolor illo magni repudiandae. Eaque ea quam nemo deleniti labore excepturi sequi numquam veritatis possimus aperiam iure alias nobis, minima beatae accusamus? Magnam aliquam earum neque commodi, quod veniam odio nisi placeat eum voluptatibus esse.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, hic soluta! Voluptate ullam dolorum dolore, qui, assumenda corporis exercitationem enim sunt animi unde molestiae optio at quam veniam explicabo odit.</p>"
        //     ,"category_id" =>1,
        //     "user_id" => 1,
        // ]);
        // Post::create([
        //     "title" => "Judul Ketiga",
        //     "slug" => "judul-ketiga",
        //     "excerpt" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga possimus ea expedita atque accusamus similique eligendi laboriosam error maxime et.",
        //     "body" => "<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius iure dignissimos corporis, facere quidem fugit dolor illo magni repudiandae. Eaque ea quam nemo deleniti labore excepturi sequi numquam veritatis possimus aperiam iure alias nobis, minima beatae accusamus? Magnam aliquam earum neque commodi, quod veniam odio nisi placeat eum voluptatibus esse.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, hic soluta! Voluptate ullam dolorum dolore, qui, assumenda corporis exercitationem enim sunt animi unde molestiae optio at quam veniam explicabo odit.</p>"
        //     ,"category_id" =>2,
        //     "user_id" => 1,
        // ]);
        // Post::create([
        //     "title" => "Judul Keempat",
        //     "slug" => "judul-keempat",
        //     "excerpt" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga possimus ea expedita atque accusamus similique eligendi laboriosam error maxime et.",
        //     "body" => "<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius iure dignissimos corporis, facere quidem fugit dolor illo magni repudiandae. Eaque ea quam nemo deleniti labore excepturi sequi numquam veritatis possimus aperiam iure alias nobis, minima beatae accusamus? Magnam aliquam earum neque commodi, quod veniam odio nisi placeat eum voluptatibus esse.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, hic soluta! Voluptate ullam dolorum dolore, qui, assumenda corporis exercitationem enim sunt animi unde molestiae optio at quam veniam explicabo odit.</p>"
        //     ,"category_id" =>2,
        //     "user_id" => 1,
        // ]);
        \App\Models\User::factory(5)->create();
        Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
