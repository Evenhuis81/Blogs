<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            Blog::create([
                'title' => Str::random(6),
                'description' => Str::random(10),
                'owner_id' => $i
            ]);
        }
    }
}
