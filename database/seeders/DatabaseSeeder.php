<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
			'password' => Hash::make('12345678'),
			'role'=> 'admin',
        ]);

		\App\Models\User::factory()->create([
            'name' => 'not admin',
            'email' => 'notadmin@test.com',
			'password' => Hash::make('12345678'),
        ]);


		Category::factory(5)->has(Product::factory()->count(10))->create();
		Review::factory(7)->create();
    }
}
