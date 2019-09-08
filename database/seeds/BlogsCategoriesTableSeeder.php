<?php

use Illuminate\Database\Seeder;

class BlogsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all the categories attaching up to 3 random categories to each blog
        $categories = App\Category::all();

        // Populate the pivot table
        App\Blog::all()->each(function ($blog) use ($categories) { 
            $blog->categories()->attach(
                $categories->random(rand(1, 4))->pluck('id')->toArray()
            ); 
        });
    }
}
