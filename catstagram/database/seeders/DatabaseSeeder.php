<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe', 
            'email' => 'john@gmail.com'
        ]);

        Post::factory(6)->create([
            'user_id' => $user->id
        ]);

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);

        // Post::create([
        //     'title' => 'Schattige Kat',
        //     'tags' => 'schattig, kitten, grijs',
        //     'location' => 'Brussel',
        //     'breed' => 'Burmilla',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tincidunt elementum turpis, vitae ultrices tortor luctus sed. Sed sed erat eu enim eleifend luctus nec et elit. Fusce porta commodo tempor.'
        // ]);

        // Post::create([
        //     'title' => 'Slaperige Kat',
        //     'tags' => 'slaperig, gevlekt',
        //     'location' => 'New York',
        //     'breed' => 'Ragdoll',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tincidunt elementum turpis, vitae ultrices tortor luctus sed. Sed sed erat eu enim eleifend luctus nec et elit. Fusce porta commodo tempor.'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
