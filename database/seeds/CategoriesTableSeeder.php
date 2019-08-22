<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Nieuws',
            'description' => 'Dit onderwerp is Nieuws.',
        ]);
        Category::create([
            'name' => 'Sport',
            'description' => 'Dit onderwerp is Sport.',
        ]);
        Category::create([
            'name' => 'Weer',
            'description' => 'Dit onderwerp is Weer.',
        ]);
        Category::create([
            'name' => 'Trends',
            'description' => 'Trends \'n stuff.',
        ]);
    }
}
