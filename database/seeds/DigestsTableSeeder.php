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
        // Digest::create([
        //     'user_id' => 4,
        //     'week' => 37
        // ]);

        // Digest::create([
        //     'user_id' => $id,
        //     'week' => 37
        // ]);

        for ($i = 1; $i < 6; $i++) {
            Digest::create([
                'user_id' => $i,
                'week' => 37
            ]);
        }
    }
}
