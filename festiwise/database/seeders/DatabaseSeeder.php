<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        \App\Models\User::factory(5)->create();
        \App\Models\Event::factory(20)->create();
        \App\Models\Ticket::factory(40)->create();

        User::create([
            'name' => "Maulana Arif",
            'email' => "maulana@gmail.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
        Category::create([
            'name' => 'Concert',
            'slug' => 'concert'
        ]);
        Category::create([
            'name' => 'Seminar',
            'slug' => 'seminar'
        ]);
        Category::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
