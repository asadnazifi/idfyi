<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6); // عنوان تصادفی
        return [
            'user_id' => 1, // یا faker->numberBetween(1,5) اگه کاربران داری
            'category_id' => 3, // برای تست، یا تصادفی بساز
            'title' => $title,
            'slug' => Str::slug($title),
            'short_content' => $this->faker->text(120),
            'content' => $this->faker->paragraphs(4, true),
            'thumbnail' => null, // چون Accessor پیش‌فرض رو داری
            'is_published' => $this->faker->boolean(90), // احتمال ۸۰٪ منتشرشده
            'published_at' => Carbon::now()->subDays(rand(0, 30)),
        ];
    }
}
