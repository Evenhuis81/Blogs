<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            Comment::create([
                'subject' => Str::random(6),
                'description' => Str::random(10),
                'owner_id' => $i
            ]);
        }
    }
}
