<?php

use Illuminate\Database\Seeder;
use App\Blog;
use Carbon\Carbon;

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
                'created_at' => Carbon::now()->subDays(rand(1,30))->format('Y-m-d H:i:s'),
                'title' => Str::random(6),
                'description' => Str::random(10),
                'owner_id' => $i
            ]);
        }
    }
}
