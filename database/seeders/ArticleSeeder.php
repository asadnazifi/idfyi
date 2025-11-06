<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::firstOrCreate(['id' => 3], [
            'name' => 'برنامه نویسی',
            'slug' => 'general',
        ]);
        Article::factory()->count(100)->create();

    }
}
