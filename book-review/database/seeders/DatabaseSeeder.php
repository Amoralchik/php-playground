<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Book::factory(50)->create()->each(function ($book) {
            $numberOfReviews = fake()->numberBetween(5, 30);
            Review::factory()->count($numberOfReviews)
                ->good()
                ->for($book)
                ->create();
        });

        Book::factory(50)->create()->each(function ($book) {
            $numberOfReviews = fake()->numberBetween(5, 30);
            Review::factory()->count($numberOfReviews)
                ->average()
                ->for($book)
                ->create();
        });

        Book::factory(50)->create()->each(function ($book) {
            $numberOfReviews = fake()->numberBetween(5, 30);
            Review::factory()->count($numberOfReviews)
                ->bad()
                ->for($book)
                ->create();
        });
    }
}
