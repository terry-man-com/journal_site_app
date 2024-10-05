<?php

namespace Database\Seeders;

use App\Models\Article;
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
        // \App\Models\User::factory(10)->create();
        // ArticleSeederの呼び出し
        if (config('app.env') == 'local') {
            $this->call(ArticleSeeder::class);
        }
    }
}
