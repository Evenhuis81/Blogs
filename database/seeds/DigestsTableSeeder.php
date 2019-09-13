<?php

use Illuminate\Database\Seeder;
use App\Digest;

class DigestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Digest::create([
            'user_id' => 4,
            'sent' => 1
        ]);
    }
}
